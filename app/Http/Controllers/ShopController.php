<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Payment;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $categories = Category::where('status',1)->get();

    //     $products = Product::with('category')
    //         ->where('status',1)
    //         ->when($request->category,function($query) use ($request){

    //             $query->where('category_id',$request->category);

    //         })
    //         ->latest()
    //         ->get();

    //     return view('shop.index',compact(
    //         'products',
    //         'categories',
    //     ));
    // }


    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();

        $products = Product::with('category')
            ->where('status', 1)
            ->when($request->category, function ($query) use ($request) {

                $query->where('category_id', $request->category);

            })
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Lấy danh sách sản phẩm user đã mua
        |--------------------------------------------------------------------------
        */

        $purchasedProductIds = collect();

        if (Auth::check()) {

            $payments = Payment::where('status', 'paid')
                ->whereHas('order', function ($query) {

                    $query->where('user_id', Auth::id());

                })
                ->with('order.orderItems')
                ->get();


            $purchasedProductIds = $payments
                ->flatMap(function ($payment) {

                    return $payment->order->orderItems
                        ->pluck('product_id');

                })
                ->unique()
                ->values();
        }


        return view('shop.index', compact(
            'products',
            'categories',
            'purchasedProductIds'
        ));
    }

    public function download(Product $product)
    {

    
        // Kiểm tra user đã đăng nhập
        if (!Auth::check()) {
            abort(403);
        }

        // Kiểm tra user đã mua sản phẩm và thanh toán thành công
        $hasPurchased = Payment::where('status', 'paid')
            ->whereHas('order', function ($query) use ($product) {

                $query->where('user_id', Auth::id())
                    ->whereHas('orderItems', function ($query) use ($product) {

                        $query->where('product_id', $product->id);

                    });

            })
            ->exists();

        // Chưa mua
        if (!$hasPurchased) {
            abort(403, 'Bạn chưa mua sản phẩm này.');
        }

        // Sản phẩm không có file
        if (!$product->file) {
            abort(404, 'Sản phẩm chưa có file tải xuống.');
        }

        // Đường dẫn file
        $filePath = $product->file;

        // Kiểm tra file tồn tại
        if (!Storage::disk('local')->exists($filePath)) {
            abort(404, 'Không tìm thấy file sản phẩm.');
        }

        // Cho tải xuống
        return Storage::disk('local')->download($filePath);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('shop.show',compact('product'));
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
