<?php

namespace App\Http\Requests;

use App\Models\ProductVariation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'attribute_values' => 'required|array',
            'variation_values.*.price' => 'required|integer',
            'variation_values.*.quantity' => 'required|integer',
            'variation_values.*.sku' =>'nullable|distinct',
            'variation_values.*.sku' => Rule::forEach(function ($value, $attribute) {
                $res = explode('.', $attribute);
                $variation = ProductVariation::findOrFail($res[1]);
                return [Rule::unique('product_variations', 'sku')->where(fn ($query) => $query->where('sku','<>',null))->ignore($variation)];
            }),
            'variation_values.*.guarantee' => 'nullable|string',
            'variation_values.*.time_guarantee' => 'nullable|string',
            'variation_values.*.sale_price' => 'nullable|integer',
            'variation_values.*.date_on_sale_from' => 'nullable',
            'variation_values.*.date_on_sale_to' => 'nullable',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ];
    }
}
