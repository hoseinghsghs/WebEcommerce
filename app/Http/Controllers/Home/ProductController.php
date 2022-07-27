<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\WishList;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        // SEO
        SEOTools::setTitle('صفحه محصول');
        SEOTools::setDescription(' فروشگاه اینترنتی لوازم آرایشی در تهران ');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');
        //END SEO
        
        $categories=Category::all();
        $brands=Brand::all();
        $services=Service::orderBy('service_order')->get();
        $category_simulation=Category::active()->where('name',$product->category->name)->get()->first();
        $product_simulation=$category_simulation->products->take(3)->sortBy('desc');
        $products_latest=Product::active()->latest()->take(3)->get();
        $wishlist = WishList::where('user_id', auth()->id())->get();
        $banner_product=Banner::active()->where('type','محصول')->get()->first();

       
  

        return view('home.page.products.show' , compact('product','categories','services','product_simulation' ,'products_latest' ,'wishlist' , 'banner_product'));
    }
}