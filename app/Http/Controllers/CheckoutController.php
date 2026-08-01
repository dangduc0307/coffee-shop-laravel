<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                'customer_name' => Auth::user()->name,
                'phone' => Auth::user()->phone,
                'email' => Auth::user()->email,
                'address' => Auth::user()->address,
                'total_price' => $total,
                'payment_method' => 'sepay',
                'status' => 'pending'
            ]);

            foreach ($cart->cartItems as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);

            }

            $payment = Payment::create([
                'order_id' => $order->id,
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
    public function show(string $id)
    {
        //
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
