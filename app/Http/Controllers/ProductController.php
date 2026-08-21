<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $locale = app()->getLocale();

        $products = Product::with('category')
            ->when($search, function ($query) use ($search, $locale) {

                $query->where(
                    "name->{$locale}",
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    "description->{$locale}",
                    'like',
                    "%{$search}%"
                );
            })
            ->latest()
            ->paginate(10);

        if ($request->expectsJson()) {
            return response()->json($products);
        }

        $categories = Category::all();

        return view(
            'admin.products.index',
            compact('categories')
        );
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
    public function store(StoreProductRequest $request)
    {
        // Nếu người dùng không chọn ảnh thì nó sẽ null
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $thumbnail = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('uploaded-images'),
                $thumbnail
            );
        }

        // ===============================
        // SOURCE FILE
        // ===============================

        $filePath = null;
        $fileSize = null;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filePath = $file->store(
                'products',
                'private'
            );

            $size = $file->getSize();

            $fileSize = round(
                $size / 1024 / 1024,
                2
            ) . ' MB';
        }

        $product = Product::create([

            'category_id' => $request->category_id,

            'name' => [
                'vi' => $request->name['vi'],
                'en' => $request->name['en'],
            ],

            'slug' => [
                'vi' => Str::slug($request->name['vi']),
                'en' => Str::slug($request->name['en']),
            ],

            'description' => [
                'vi' => $request->description['vi'],
                'en' => $request->description['en'],
            ],

            'price' => $request->price,

            'thumbnail' => $thumbnail,

            'file' => $filePath,

            'file_size' => $fileSize,

            'demo_url' => $request->demo_url,

            'documentation_url' => $request->documentation_url,

            'requirements' => $request->requirements,

            'featured' => $request->featured,

            'status' => $request->status,

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thêm thành công.',
            'data' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
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
    public function update(
        UpdateProductRequest $request,
        Product $product
    ) {
        // Nếu người dùng không chọn ảnh thì giữ ảnh cũ
        $thumbnail = $product->thumbnail;

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $thumbnail = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('encrypted-images'),
                $thumbnail
            );
        }

        // ===============================
        // FILE SOURCE
        // ===============================

        $filePath = $product->file;
        $fileSize = $product->file_size;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filePath = $file->store(
                'products',
                'private'
            );

            $size = $file->getSize();

            $fileSize = round(
                $size / 1024 / 1024,
                2
            ) . ' MB';
        }

        $product->update([

            'category_id' => $request->category_id,

            'name' => [
                'vi' => $request->name['vi'],
                'en' => $request->name['en'],
            ],

            'slug' => [
                'vi' => Str::slug($request->name['vi']),
                'en' => Str::slug($request->name['en']),
            ],

            'description' => [
                'vi' => $request->description['vi'],
                'en' => $request->description['en'],
            ],

            'price' => $request->price,

            'thumbnail' => $thumbnail,

            // ===============================
            // THÔNG TIN SOURCE CODE
            // ===============================

            'file' => $filePath,

            'file_size' => $fileSize,

            'demo_url' => $request->demo_url,

            'documentation_url' => $request->documentation_url,

            'requirements' => $request->requirements,

            'featured' => $request->featured,

            'status' => $request->status,

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công.',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa.'
        ]);
    }
}