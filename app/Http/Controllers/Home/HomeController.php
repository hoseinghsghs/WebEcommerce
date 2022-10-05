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
use App\Models\Setting;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::findOrNew(1);
        SEOTools::setDescription($settings->description);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        SEOTools::setCanonical(env('APP_URL'));
        OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
        OpenGraph::addProperty('site_name', env('APP_NAME'));
        OpenGraph::addProperty('locale', 'fa');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@metawebs_ir');
        SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo));

        $brands =                           Brand::active()->get();

        $posts =                            Post::active()->get()->take(5);

        $categories =                       Category::where('parent_id', 0)->where('is_active', 1)->get();
        $products_is_show =                 Category::where('parent_id','!=', 0)->where('is_active', 1)->where('is_show', 1)->get();

        $services =                         Service::orderBy('service_order')->get();

        $sliders =                          Banner::active()->where('type', 'اسلایدر')->get();
        $headers =                          Banner::active()->where('type', 'هدر')->get()->sortBy('priority')->take(4);
        $centers =                          Banner::active()->where('type', 'وسط')->get()->sortBy('priority')->take(2);

        $Products_auction_today =           Product::active()->where('position', 'تخفیف روزانه')->get()->take(15);
        $Products_our_suggestion =          Product::active()->where('position', 'پیشنهاد ما')->get()->take(15);
        $Products_special =                 Product::active()->where('position', 'فروش ویژه')->get()->take(15);

        $Products_our_suggestion_units =    Product::active()->where('position', 'تک محصول')->get()->take(5);

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
        $settings = Setting::findOrNew(1);
        SEOTools::setDescription($settings->description);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
        OpenGraph::addProperty('site_name', env('APP_NAME'));
        OpenGraph::addProperty('locale', 'fa');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@metawebs_ir');
        SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo));
        
        return view('home.page.contact-us');
    }
}