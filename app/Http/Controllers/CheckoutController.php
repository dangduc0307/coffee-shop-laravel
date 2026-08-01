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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = Cart::with('cartItems.product')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('checkout.create', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
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

            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'total_price' => $total,
                'payment_method' => 'sepay',
                'status' => 'pending',
            ]);

            foreach ($cart->cartItems as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);

            }

            $paymentCode = 'CF-' .
                now()->format('YmdHis') .
                '-' .
                strtoupper(Str::random(6));

            $payment = Payment::create([
                'order_id' => $order->id,
                'payment_code' => $paymentCode,
                'payment_method' => 'bank_transfer',
                'amount' => $total,
                'currency' => 'VND',
                'status' => 'pending',
                'gateway' => 'SePay'
            ]);

            DB::commit();

            return redirect()->route('checkout.show', $payment->id);

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $checkout)
    {
        $checkout->load('order');

        return view('checkout.show', [
            'payment' => $checkout,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
