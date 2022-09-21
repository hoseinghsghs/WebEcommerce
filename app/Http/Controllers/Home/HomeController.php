<?php

namespace App\Http\Controllers\Home;

use App\Events\NotificationMessage;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOTools;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    public function index()
    {
        

        // SEO
        SEOTools::setTitle('خانه');
        SEOTools::setDescription(' فروشگاه اینترنتی لوازم آرایشی در تهران ');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');
        //END SEO

        $brands =                        Brand::active()->get();

        $posts =                         Post::active()->get()->take(5);

        $categories =                    Category::where('parent_id', 0)->where('is_active', 1)->get();
        $products_is_show =               Category::where('parent_id','!=', 0)->where('is_active', 1)->where('is_show', 1)->get();
        

        $services =                      Service::orderBy('service_order')->get();

        $sliders =                       Banner::active()->where('type', 'اسلایدر')->get();
        $headers =                       Banner::active()->where('type', 'هدر')->get()->sortBy('priority')->take(4);
        $centers =                       Banner::active()->where('type', 'وسط')->get()->sortBy('priority')->take(2);

        // $banner_left_top =               Banner::active()->where('type', 'هدر-چپ-بالا')->get()->first();
        // $banner_left_bottom =            Banner::active()->where('type', 'هدر-چپ-پایین')->get()->first();

        // $banner_left_category =          Banner::active()->where('type', 'چپ-دسته بندی')->get()->first();
        // $banner_right_category =         Banner::active()->where('type', 'راست-دسته بندی')->get()->first();

        // $banner_width =                  Banner::active()->where('type', 'عرضی')->get()->first();

        // $banner_end_right =              Banner::active()->where('type', 'آخر-راست')->get()->first();
        // $banner_end_left_top =           Banner::active()->where('type', 'آخر-چپ-بالا')->get()->first();
        // $banner_end_left_bottom_1 =      Banner::active()->where('type', 'آخر-چپ-پایین-1')->get()->first();
        // $banner_end_left_bottom_2 =      Banner::active()->where('type', 'آخر-چپ-پایین-2')->get()->first();

        $Products_auction_today =        Product::active()->where('position', 'تخفیف روزانه')->get()->take(15);
        $Products_our_suggestion =       Product::active()->where('position', 'پیشنهاد ما')->get()->take(15);
        $Products_special =              Product::active()->where('position', 'فروش ویژه')->get()->take(15);


        $Products_our_suggestion_units =  Product::active()->where('position', 'تک محصول')->get()->take(15);

        return view(
            'home.page.home',
            compact(
                'categories',
                'sliders',
                'services',
                'Products_auction_today',
                'Products_our_suggestion',
                'Products_our_suggestion_units',
                'Products_special',
                'brands',
                'posts',
                'headers',
                'centers',
                'products_is_show'

            )
        );
    }

    public function contactUs()
    {
        return view('home.page.contact-us');
    }
}