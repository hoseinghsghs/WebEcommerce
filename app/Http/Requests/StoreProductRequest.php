<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'variation_values.time_guarantee.*' => 'زمان گارانتی',
            'variation_values.guarantee.*'=>'گارانتی',
            'variation_values.sku.*'=>'شناسه انبار',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'brand_id' => 'nullable|exists:brands,id',
            'position' => ['required', Rule::in(['پیش فرض', 'فروش ویژه', 'پیشنهاد ما', 'تک محصول'])],
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|exists:tags,id',
            'description' => 'required|string',
            'primary_image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2000',
            'category_id' => 'required|exists:categories,id',
            'attribute_ids' => 'required|array',
            'attribute_ids.*' => 'required|string',
            'variation_values' => 'required|array',
            'variation_values.value.*' => 'required|string|distinct',
            'variation_values.price.*' => 'required|integer',
            'variation_values.quantity.*' => 'required|integer',
            'variation_values.sku.*' => 'nullable|string|distinct|unique:product_variations,sku',
            'variation_values.guarantee.*' => 'nullable|string',
            'variation_values.time_guarantee.*' => 'nullable|string',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ];
    }
}
