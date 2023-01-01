<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;


class EditProduct extends Component
{
    public Product $product;
    public string $name = '';
    public string $position = 'پیش فرض';
    public bool $status = false;
    public int|null $brand_id = null;
    public array $tags_id = [];
    public string $description = '';
    public array $attribute_values = [];
    public array $variations = [];
    public string|null $delivery_amount = null;
    public string|null $delivery_amount_per_product = null;
    protected $validationAttributes = [
        'attribute_values.*.value' => '',
        'variations.*.time_guarantee' => 'زمان گارانتی',
        'variations.*.guarantee' => 'گارانتی',
        'variations.*.sku' => 'شناسه انبار',
        'variations.*.price' => 'قیمت',
        'variations.*.name' => 'عنوان',
        'variations.*.quantity' => 'تعداد',
        'delivery_amount_per_product' => 'هزینه ارسال به ازای محصول',
        'variations.*.date_on_sale_from' => 'تاریخ شروع حراجی',
        'variations.*.date_on_sale_to' => 'تاریخ پایان حراجی',
        'variations.*.sale_price' => 'قیمت حراجی',
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'brand_id' => 'nullable|exists:brands,id',
            'position' => ['required', Rule::in(['پیش فرض', 'فروش ویژه', 'پیشنهاد ما', 'تک محصول'])],
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'nullable|exists:tags,id',
            'description' => 'required|string',
            'attribute_values' => 'required|array',
            'attribute_values.*' => 'required|array',
            'attribute_values.*.value' => 'required|string',
            'variations' => 'required|array|min:1',
            'variations.*' => 'required|array',
            'variations.*.name' => 'required|string|distinct',
            'variations.*.price' => 'required|integer',
            'variations.*.quantity' => 'required|integer',
            'variations.*.sku' => Rule::forEach(function ($value, $attribute) {
                $res = explode('.', $attribute);
                $variation = ProductVariation::findOrFail($res[1]);
                return ['nullable', 'string', 'distinct', Rule::unique('product_variations', 'sku')->where(fn($query) => $query->where('sku', '<>', null))->ignore($variation)];
            }),
            'variations.*.guarantee' => 'nullable|string',
            'variations.*.time_guarantee' => 'nullable|string',
            'variations.*.sale_price' => Rule::forEach(function ($value, $attribute) {
                $res = explode('.', $attribute);
                return ["required_with:variations.$res[1].date_on_sale_from,variations.$res[1].date_on_sale_to", 'nullable', 'integer'];
            }),
            'variations.*.date_on_sale_from' => Rule::forEach(function ($value, $attribute) {
                $res = explode('.', $attribute);
                return ["required_with:variations.$res[1].sale_price,variations.$res[1].date_on_sale_to", 'nullable', 'date', "after_or_equal:variations.$res[1].date_on_sale_from"];
            }),
            'variations.*.date_on_sale_to' => Rule::forEach(function ($value, $attribute) {
                $res = explode('.', $attribute);
                return ["required_with:variations.$res[1].sale_price,variations.$res[1].date_on_sale_from", 'nullable', 'date', "after_or_equal:variations.$res[1].date_on_sale_from"];
            }),
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'required|integer',
        ];
    }

    public function mount()
    {
        $this->name = $this->product->name;
        $this->position = $this->product->position;
        $this->status = !$this->product->is_active;
        $this->brand_id = $this->product->brand_id;
        $this->tags_id = $this->product->tags()->pluck('id')->toArray();
        $this->description = $this->product->description;
        $this->delivery_amount = $this->product->delivery_amount;
        $this->delivery_amount_per_product = $this->product->delivery_amount_per_product;

        $product_attributes = $this->product->attributes()->with('attribute')->get();
        foreach ($product_attributes as $attribute) {
            $this->attribute_values[$attribute->id] = ['attribute_name' => $attribute->attribute->name, 'value' => $attribute->value];
        }

        $product_variation = $this->product->variations()->get();
        foreach ($product_variation as $variation) {
            $this->variations[$variation->id]['variation_name'] = $variation->attribute->name;
            $this->variations[$variation->id]['name'] = $variation->value;
            $this->variations[$variation->id]['price'] = $variation->price;
            $this->variations[$variation->id]['quantity'] = $variation->quantity;
            $this->variations[$variation->id]['sku'] = $variation->sku;
            $this->variations[$variation->id]['guarantee'] = $variation->guarantee;
            $this->variations[$variation->id]['time_guarantee'] = $variation->time_guarantee;
            $this->variations[$variation->id]['sale_price'] = $variation->sale_price;
            $this->variations[$variation->id]['date_on_sale_from'] = $variation->date_on_sale_from;
            $this->variations[$variation->id]['date_on_sale_to'] = $variation->date_on_sale_to;
        }
    }

    public function updatedVariations()
    {
        $this->validateOnly("variations.*.sku");
    }

    public function edit()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $this->product->update([
                'name' => $this->name,
                'position' => $this->position,
                'brand_id' => $this->brand_id,
                'description' => $this->description,
                'is_active' => !$this->status,
                'delivery_amount' => $this->delivery_amount,
                'delivery_amount_per_product' => $this->delivery_amount_per_product,
            ]);

            $productAttributeController = new ProductAttributeController();
            $productAttributeController->update($this->attribute_values);

            $productVariationController = new ProductVariationController();
            $productVariationController->update($this->variations);

            $this->product->tags()->sync($this->tags_id);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('message', ['toast' => false, 'type' => 'error', 'title' => 'خطا در ویرایش محصول', 'text' => $ex->getMessage()]);
        }
        session()->flash('message', ['toast' => true, 'type' => 'success', 'title' => 'تغییرات با موفقیت ذخیره شد']);
    }

    public function render()
    {
        $brands = Brand::all();
        $tags = Tag::all();

        return view('livewire.admin.products.edit-product', compact('brands', 'tags'))->extends('admin.layout.MasterAdmin')->section('Content');
    }
}
