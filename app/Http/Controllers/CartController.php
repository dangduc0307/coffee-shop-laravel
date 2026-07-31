<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('user_id',auth()->id())->first();

        $cartItems=[];

        if($cart){

            $cartItems = CartItem::with('product')

                ->where('cart_id',$cart->id)

                ->get();

        }

        return view('carts.index',compact('cartItems'));

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
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $item = CartItem::where('cart_id',$cart->id)
            ->where('product_id',$request->product_id)
            ->first();

        if($item){

            $item->increment('quantity');

        }else{

            CartItem::create([

                'cart_id'=>$cart->id,

                'product_id'=>$request->product_id,

                'quantity'=>1

            ]);

        }

        return response()->json([
            'success'=>true
        ]);
    }


    public function count()
    {
        $count = CartItem::whereHas('cart',function($q){

            $q->where('user_id',auth()->id());

        })->sum('quantity');

        return response()->json([
            'count'=>$count
        ]);
    }

    public function summary()
    {
        $cartItems = CartItem::whereHas('cart', function ($q) {

            $q->where('user_id', auth()->id());

        })
        ->with('product')
        ->get();

        return response()->json($cartItems);
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
    public function update(Request $request, CartItem $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $stock = $cart->product->stock;

        $quantity = min($request->quantity, $stock);

        $cart->update([
            'quantity' => $quantity,
        ]);

        return response()->json([
            'success' => true,
            'quantity' => $quantity,
        ]);
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cart)
    {
        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa',
        ]);
    }
}
