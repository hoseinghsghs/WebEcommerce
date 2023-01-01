<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateProduct extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $position = 'پیش فرض';
    public bool $status = false;
    public int|null $brand_id = null;
    public array $tags_id = [];
    public string $description = '';
    public int|null $category_id = null;
    public $category_attributes;
    public $category_variation;
    public array $attribute_values = [];
    public array $variations = [['name' => '', 'price' => null, 'quantity' => null, 'sku' => '', 'guarantee' => '', 'time_guarantee' => '']];
    public string|null $delivery_amount = null;
    public string|null $delivery_amount_per_product = null;
    public $primary_image;

    protected $validationAttributes = [
        'variations.*.time_guarantee' => 'زمان گارانتی',
        'variations.*.guarantee' => 'گارانتی',
        'variations.*.sku' => 'شناسه انبار',
        'variations.*.price' => 'قیمت',
        'variations.*.name' => 'عنوان',
        'variations.*.quantity' => 'تعداد',
        'delivery_amount_per_product' => 'هزینه ارسال به ازای محصول'
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
            'primary_image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2000',
            'category_id' => 'required|exists:categories,id',
            'attribute_values' => 'required|array',
            'attribute_values.*' => 'required|string',
            'variations' => 'required|array|min:1',
            'variations.*' => 'required|array',
            'variations.*.name' => 'required|string|distinct',
            'variations.*.price' => 'required|integer',
            'variations.*.quantity' => 'required|integer',
            'variations.*.sku' => 'nullable|string|distinct|unique:product_variations,sku',
            'variations.*.guarantee' => 'nullable|string',
            'variations.*.time_guarantee' => 'nullable|string',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'required|integer',
        ];
    }

    public function mount()
    {
        Session::forget('images');
    }

    public function addVariation()
    {
        $this->variations[] = [];
    }

    public function removeVariation($index)
    {
        array_splice($this->variations, $index, 1);
    }

    public function updatedCategoryId()
    {
        $category = Category::findOrFail($this->category_id);
        $this->category_attributes = $category->attributes()->wherePivot('is_variation', 0)->get();
        foreach ($this->category_attributes as $attribute) {
            $this->attribute_values[$attribute->id] = '';
        }
        $this->category_variation = $category->attributes()->wherePivot('is_variation', 1)->first();
    }

    public function updatedVariations()
    {
        $this->validateOnly("variations.*.sku");
    }

    public function create()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            if ($this->primary_image) {
                $ImageController = new ImageController();
                $image_name = $ImageController->UploadeImage($this->primary_image, "primary_image", 900, 800);
            } else {
                $image_name = null;
                $this->addError('primary_image', 'مشکل در ذخیره سازی عکس');
            }
            $product = Product::create([
                'name' => $this->name,
                'position' => $this->position,
                'brand_id' => $this->brand_id,
                'category_id' => $this->category_id,
                'primary_image' => $image_name,
                'description' => $this->description,
                'is_active' => !$this->status,
                'delivery_amount' => $this->delivery_amount,
                'delivery_amount_per_product' => $this->delivery_amount_per_product,
            ]);

            $imagesStore = Session::pull('images', []);
            foreach ($imagesStore as $imageStore) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageStore
                ]);
            }

            $productAttributeController = new ProductAttributeController();
            $productAttributeController->store($this->attribute_values, $product);

            $productVariationController = new ProductVariationController();
            $productVariationController->store($this->variations, $this->category_variation->id, $product);
            if (count($this->tags_id) > 0) {
                $product->tags()->attach($this->tags_id);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('خطا', $ex->getMessage())->showConfirmButton('تایید');
            return redirect()->back();
        }
        Session::forget('images');
        alert()->success('محصول مورد نظر ایجاد شد')->toToast();
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $categories = Category::where('parent_id', 0)->with('children.children')->get();
        return view('livewire.admin.products.create-product', compact('brands', 'tags', 'categories'))->extends('admin.layout.MasterAdmin')->section('Content');
    }
}
