<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create()
    {
        $cart = Cart::with('cartItems.product')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('checkout.create', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'email'         => 'required|email|max:255',
            'address'       => 'required|string|max:500',
        ]);

        $cart = Cart::with('cartItems.product')
            ->where('user_id', Auth::id())
            ->first();

        if (!$cart || $cart->cartItems->isEmpty()) {
            return back()->with('error', 'Giỏ hàng đang trống.');
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cart->cartItems as $item) {
                $total += $item->product->price * $item->quantity;
            }

            // 1. Tạo Order
            $order = Order::create([
                'user_id'        => Auth::id(),
                'customer_name'  => $request->customer_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'address'        => $request->address,
                'total_price'    => $total,
                'payment_method' => 'sepay',
                'status'         => 'pending',
            ]);

            // 2. Tạo Order Items
            foreach ($cart->cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price
                ]);
            }

            // 3. Tạo Mã Payment (Định dạng CF + 12 số/ký tự)
            $paymentCode = 'CF' . time() . strtoupper(Str::random(3));

            $payment = Payment::create([
                'order_id'       => $order->id,
                'payment_code'   => $paymentCode,
                'payment_method' => 'bank_transfer',
                'amount'         => $total,
                'currency'       => 'VND',
                'status'         => 'pending',
                'gateway'        => 'SePay'
            ]);

            DB::commit();

            return redirect()->route('checkout.show', $payment->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Payment $checkout)
    {
        $checkout->load('order');

        // Lấy thông tin ngân hàng từ config hoặc tĩnh
        $bankCode = config('sepay.bank', 'VPBank');
        $accountNumber = config('sepay.account_number', '0372718388');
        $accountName = config('sepay.account_name', 'DANG DUC');

        // Tạo VietQR URL dựa theo cách tạo từ SepayController cũ
        $vietQrUrl = "https://img.vietqr.io/image/"
            . $bankCode . "-" . $accountNumber
            . "-compact2.jpg"
            . "?amount=" . $checkout->amount
            . "&addInfo=" . urlencode($checkout->payment_code)
            . "&accountName=" . urlencode($accountName);

        return view('checkout.show', [
            'payment'   => $checkout,
            'vietQrUrl' => $vietQrUrl,
            'bankInfo'  => [
                'bank_code'      => $bankCode,
                'account_number' => $accountNumber,
                'account_name'   => $accountName,
            ]
        ]);
    }

    // Ajax kiểm tra trạng thái thanh toán ở màn hình chờ
    public function paymentStatus(Payment $payment)
    {
        return response()->json([
            'status'       => $payment->status, // 'pending' hoặc 'paid'
            'redirect_url' => $payment->status === 'paid' ? route('checkout.success', $payment->id) : null
        ]);
    }

    public function success(Payment $payment)
    {
        return view('checkout.success', compact('payment'));
    }
}