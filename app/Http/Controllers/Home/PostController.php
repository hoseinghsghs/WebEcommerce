<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function seoparameter()
    {
        $settings = Setting::findOrNew(1);
        SEOTools::setDescription($settings->description);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
        OpenGraph::addProperty('site_name', env('APP_NAME'));
        OpenGraph::addProperty('locale', 'fa');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@likoshop_ir');
        SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo)); 
    }

    public function show(Post $post)
    {
       $this->seoparameter();
       SEOTools::setCanonical(env('APP_URL').'/post');

        $posts=Post::where('status' , 1)->where('category' , 'محبوب ها')->latest()->take(3)->get();
        $posts_category=Post::where('status' , 1)->select('category')->distinct()->get();
        return view('home.page.posts.show' , compact('post' , 'posts' , 'posts_category'));

    }
    public function index()
    {
        $this->seoparameter();

        $posts=Post::where('status' , 1)->latest()->paginate(9);
        return view('home.page.posts.index' , compact('posts'));
    }
    public function list($category)
    {
        $this->seoparameter();
        SEOTools::setCanonical(env('APP_URL').'/post');

        
        $posts=Post::where('status' , 1)->latest()->where('category', $category)->paginate(9);
        return view('home.page.posts.index',compact('posts'));
    }
}