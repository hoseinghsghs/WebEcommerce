<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\WishList;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }

        $product->load(['category.parent', 'attributes', 'tags', 'brand', 'rates']);
        $settings = Setting::findOrNew(1);
        SEOTools::setDescription($settings->description);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        SEOTools::setCanonical(env('APP_URL') . '/products');
        OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
        OpenGraph::addProperty('site_name', env('APP_NAME'));
        OpenGraph::addProperty('locale', 'fa');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@likoshop_ir');
        SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo));

        $categories = Category::all();
//        $brands=Brand::all();
        $services = Service::orderBy('service_order')->get();

        // $category_simulation=Category::active()->where('name',$product->category->name)->get()->first();
        // $product_simulation=$category_simulation->products->take(3)->sortBy('desc');
        //$products_latest=Product::active()->latest()->take(3)->get();
        $wishlist = WishList::where('user_id', auth()->id())->get();
        $banner_product = Banner::active()->where('type', 'محصول')->get()->first();
        $main_attributes = $product->attributes()->whereIn('attribute_id', $product->category->attributes()->where('is_main', true)->pluck('id')->toArray())->with('attribute')->get();

        return view('home.page.products.show', compact('product', 'categories', 'services', 'wishlist', 'banner_product', 'main_attributes'));
    }
}
