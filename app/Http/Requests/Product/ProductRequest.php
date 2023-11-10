<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productID = $this->route('product');
        $imageRequired = $productID ? 'required' : 'nullable';
        return [
            'name' => 'required|string|unique:products,name,'.$productID.'|max:255|min:3',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'image' => $imageRequired.'|image|max:1024|mimes:jpg,jpeg,png',
            'variants' => 'required|array|min:1',
            'variants.*.price' => 'required|numeric|min:1',
            'variants.*.size' => 'required|string|in:s,m,l,xl,xxl,xxxl',
            'variants.*.quantity' => 'required|integer|min:1',
            'variants.*.color' => 'required|string',
            'variants.*.image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
