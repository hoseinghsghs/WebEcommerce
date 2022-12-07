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
use Illuminate\Support\Facades\Notification;
use App\Notifications\OtpSms;

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

        $brands = Brand::active()->get();

        $posts = Post::active()->get()->take(5);

        $main_categories=Category::active()->with('children.children')->get();
        $categories = $main_categories->where('parent_id', 0)->all();
        $products_is_show = $main_categories->where('parent_id', '!=', 0)->where('is_show', '==',1)->load(['products'])->all();

        $services = Service::orderBy('service_order')->get();

        $banners = Banner::active()->get();
        $sliders = $banners->where('type', 'اسلایدر')->all();
        $headers = $banners->where('type', 'هدر')->sortBy('priority')->values()->take(6);
        $centers = $banners->where('type', 'وسط')->sortBy('priority')->values()->take(2);
        // $menue_banner =                     Banner::active()->where('type', 'منو')->where('is_active', 1)->first();

        $products = Product::active()->get();
//        $Products_auction_today = $products->where('position', 'تخفیف روزانه')->take(15);
        $Products_our_suggestion = $products->where('position', 'پیشنهاد ما')->take(15);
        $Products_special = $products->where('position', 'فروش ویژه')->take(15);
        $Products_our_suggestion_units = $products->where('position', 'تک محصول')->take(2);

        try{
                    Notification::route('cellphone', '09139035692')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                }catch (\Throwable $th) {
                     dd($th);
                }

        return view(
            'home.page.home',
            compact(
                'categories',
                'sliders',
                'services',
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
