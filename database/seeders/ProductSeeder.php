<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\ProductAttributeController;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $brand=Brand::all()->random();
        $category=Category::where('parent_id','<>',0)->get()->random();
        $attributes = $category->attributes()->wherePivot('is_variation', 0)->get();
        $variation = $category->attributes()->wherePivot('is_variation', 1)->first();
        $tags = Tag::all()->random(2);
        if($brand && $category && $attributes && $tags){
            Product::factory()->count(5)->for($brand)->for($category)
            ->hasAttached($attributes, ['value' => fake()->word()])
            ->hasAttached($tags);
        } */
        for ($i = 0; $i < 5; $i++) {
            $brand = Brand::all()->random();
            $category = Category::where('parent_id', '<>', 0)->get()->random();
            $attributes = $category->attributes()->wherePivot('is_variation', 0)->get();
            $variation = $category->attributes()->wherePivot('is_variation', 1)->first();
            $tags = Tag::all()->random(2);
            try {
                DB::beginTransaction();
                $product = Product::create([
                    'name' => fake()->words(3, true),
                    'position' => fake()->randomElement(['تخفیف روزانه', 'فروش ویژه', 'پیشنهاد ما']),
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                    'primary_image' => 'fake-image.jpg',
                    'description' => fake()->paragraph(40),
                    'delivery_amount' => '20000',
                    'delivery_amount_per_product' => '10000'
                ]);

                foreach ($attributes as $attribute) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute->id,
                        'value' => fake()->word()
                    ]);
                }

                $counter = rand(1, 3);

                for ($i = 0; $i < $counter; $i++) {
                    ProductVariation::create([
                        'attribute_id' => $variation->id,
                        'product_id' => $product->id,
                        'value' => fake()->word(),
                        'price' => fake()->randomNumber(6, true),
                        'quantity' => fake()->numberBetween(0, 20),
                        'sku' => fake()->unique()->randomNumber(5, true),
                        'guarantee' => 'آواژنگ',
                        'time_guarantee' => "یکسال",
                    ]);
                }
                $product->tags()->attach($tags->pluck('id')->toArray());
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                dd($ex);
            }
        }
    }
}
