<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store($attributes, $product)
    {
        foreach ($attributes as $key => $value) {
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $key,
                'value' => $value
            ]);
        }
    }

    public function update($attributes)
    {
        foreach ($attributes as $key => $attribute) {
            $productAttribute = ProductAttribute::findOrFail($key);
            $productAttribute->update([
                'value' => $attribute['value']
            ]);
        }
    }
    public function change($attributes, $product)
    {
        ProductAttribute::where('product_id' , $product->id)->delete();

        foreach ($attributes as $key => $value) {
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $key,
                'value' => $value
            ]);
        }
    }
}
