<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentLog;
use App\Events\PaymentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SepayWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $apiKey = env('SEPAY_API_KEY');

        Log::info('Authorization Header', [
            'received' => $request->header('Authorization'),
            'expected' => 'Apikey ' . $apiKey,
        ]);

        if (
            $apiKey &&
            $request->header('Authorization') !== 'Apikey ' . $apiKey
        ) {
            Log::error('SePay Webhook: Sai API Key');

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $data = $request->all();

        // SePay có thể gửi 1 transaction hoặc 1 mảng transactions
        $transactions = $data['transactions'] ?? [$data];

        foreach ($transactions as $transaction) {
            DB::beginTransaction();

            try {
                // Lấy nội dung chuyển khoản & mã giao dịch ngân hàng
                $content = $transaction['content'] ?? $transaction['description'] ?? '';
                $transferCode = $transaction['transferCode'] ?? $transaction['reference_number'] ?? null;
                $transferAmount = $transaction['transferAmount'] ?? $transaction['amount_in'] ?? 0;

                // 2. Bóc tách mã CF... bằng Regex (Tham khảo từ controller cũ)
                preg_match('/CF[0-9A-Za-z\-]+/', $content, $matches);

                if (empty($matches[0])) {
                    Log::warning('SePay Webhook: Không tìm thấy mã CF trong content: ' . $content);
                    
                    PaymentLog::create([
                        'payment_id' => null,
                        'status'     => 'error',
                        'message'    => 'Không tìm thấy mã giao dịch trong content: ' . $content,
                        'response'   => json_encode($transaction)
                    ]);

                    DB::commit();
                    continue;
                }

                $paymentCode = $matches[0];
                Log::info('SePay Webhook Matched Code:', ['payment_code' => $paymentCode]);

                // 3. Tìm Payment theo mã bóc tách được
                $payment = Payment::where('payment_code', $paymentCode)->first();

                if (!$payment) {
                    PaymentLog::create([
                        'payment_id' => null,
                        'status'     => 'error',
                        'message'    => 'Không tìm thấy Payment trong Database với mã: ' . $paymentCode,
                        'response'   => json_encode($transaction)
                    ]);

                    DB::commit();
                    continue;
                }

                // Nếu đã thanh toán rồi thì bỏ qua
                if ($payment->status === 'paid') {
                    DB::commit();
                    continue;
                }

                // Eager Load relationship để tránh lỗi lazy load
                $payment->load(['order.orderItems.product', 'order.user.cart']);

                // 4. Cập nhật Payment -> paid
                $payment->update([
                    'status'           => 'paid',
                    'transaction_id'   => $transferCode,
                    'gateway_response' => json_encode($transaction),
                    'paid_at'          => now()
                ]);

                // 5. Cập nhật Order -> paid
                if ($payment->order) {
                    $payment->order->update([
                        'status' => 'paid'
                    ]);

                    // Trừ số lượng tồn kho sản phẩm
                    foreach ($payment->order->orderItems as $item) {
                        if ($item->product) {
                            $item->product()->decrement('stock', $item->quantity);
                        }
                    }

                    // Xóa giỏ hàng của user
                    $user = $payment->order->user;
                    if ($user && $user->cart) {
                        $user->cart->cartItems()->delete();
                        $user->cart->delete();
                    }
                }

                // 6. Ghi log thành công
                PaymentLog::create([
                    'payment_id' => $payment->id,
                    'status'     => 'paid',
                    'message'    => 'Thanh toán thành công qua SePay.',
                    'response'   => json_encode($transaction)
                ]);

                DB::commit();

                

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('SePay Webhook Exception: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        }

        return response()->json(['success' => true, 'message' => 'Webhook processed successfully'], 200);
    }
}