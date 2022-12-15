<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store($variations, $attributeId, $product)
    {
        $counter = count($variations['value']);

        for ($i = 0; $i < $counter; $i++) {
            ProductVariation::create([
                'attribute_id' => $attributeId,
                'product_id' => $product->id,
                'value' => $variations['value'][$i],
                'price' => $variations['price'][$i],
                'quantity' => $variations['quantity'][$i],
                'sku' => $variations['sku'][$i],
                'guarantee' => $variations['guarantee'][$i],
                'time_guarantee' => $variations['time_guarantee'][$i],
            ]);
        }
    }

    public function update($variationIds)
    {

        foreach($variationIds as $key => $variation){
            // $date_from=str_replace("/","-",$variation['date_on_sale_from']);
            // $date_to=str_replace("/","-",$variation['date_on_sale_to']);
            $productVariation = ProductVariation::findOrFail($key);
            $productVariation->update([
                'value'=>$variation['value'],
                'price' => $variation['price'],
                'quantity' => $variation['quantity'],
                'sku' => $variation['sku'],
                'guarantee' => $variation['guarantee'],
                'time_guarantee' => $variation['time_guarantee'],
                'sale_price' => $variation['sale_price'],
                'date_on_sale_from' => $variation['date_on_sale_from'],
                'date_on_sale_to' => $variation['date_on_sale_to'],
            ]);
        }
    }

    public function change($variations, $attributeId, $product)
    {
        ProductVariation::where('product_id' , $product->id)->delete();

        $counter = count($variations['value']);
        for ($i = 0; $i < $counter; $i++) {
            ProductVariation::create([
                'attribute_id' => $attributeId,
                'product_id' => $product->id,
                'value' => $variations['value'][$i],
                'price' => $variations['price'][$i],
                'quantity' => $variations['quantity'][$i],
                'sku' => $variations['sku'][$i],
                'guarantee' => $variations['guarantee'][$i],
                'time_guarantee' => $variations['time_guarantee'][$i],

            ]);
        }
    }

}
