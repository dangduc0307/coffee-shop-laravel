<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            // 'thumbnail' => 'nullable|image',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file' => 'required|file|mimes:zip,rar,7z|max:51200',

            'file_size' => 'nullable|string|max:50',

            'demo_url' => 'nullable|url|max:255',

            'documentation_url' => 'nullable|url|max:255',

            'requirements' => 'nullable|string',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}
