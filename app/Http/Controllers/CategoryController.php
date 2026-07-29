<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Lấy dữ liệu mới nhất lên trước
        $categories = Category::latest()->get();

        //Request (yêu cầu) gửi lên có mong muốn nhận dữ liệu JSON hay không?
        if ($request->expectsJson()) {
            return response()->json($categories);
        }

        return view('categories.index', compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        $image = null;

        //Kiểm tra request gửi lên có file với tên là image hay không?
        if ($request->hasFile('image')) {
            // Lấy đối tượng UploadedFile của ảnh người dùng tải lên
            $file = $request->file('image');

            // Ghép thời gian hiện tại với tên gốc của ảnh để tạo tên file duy nhất
            $image = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploaded-images'), $image);

        }

        $product = Category::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'image' => $image,

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
    public function show(Category $category)
    {
        return response()->json($category);
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
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $image = $category->image;
        //Kiểm tra request gửi lên có file với tên là image hay không?
        if ($request->hasFile('image')) {
            // Lấy đối tượng UploadedFile của ảnh người dùng tải lên
            $file = $request->file('image');

            // Ghép thời gian hiện tại với tên gốc của ảnh để tạo tên file duy nhất
            $image = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploaded-images'), $image);

        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Cập nhật thành công",
            'data' => $category,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => "Xóa thành công",
        ]);
    }
}
