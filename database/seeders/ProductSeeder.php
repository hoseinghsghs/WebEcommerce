<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand=Brand::all()->random();
        $category=Category::where('parent_id','<>',0)->get()->random();
        $attributes = $category->attributes()->wherePivot('is_variation', 0)->get();
        $variation = $category->attributes()->wherePivot('is_variation', 1)->first();
        $tags = Tag::all()->random(2);
        if($brand && $category && $attributes && $tags){
            Product::factory()->count(5)->for($brand)->for($category)
            ->hasAttached($attributes, ['value' => fake()->word()])
            ->hasAttached($tags);
        }
    }
}
