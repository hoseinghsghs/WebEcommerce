<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $posts=Post::where('status' , 1)->where('category' , 'محبوب ها')->latest()->take(3)->get();
        $posts_category=Post::where('status' , 1)->select('category')->distinct()->get();
        return view('home.page.posts.show' , compact('post' , 'posts' , 'posts_category'));

    }
    public function index()
    {
        $posts=Post::where('status' , 1)->latest()->paginate(9);
        return view('home.page.posts.index' , compact('posts'));
    }
    public function list($category)
    {
        $posts=Post::where('status' , 1)->latest()->where('category', $category)->paginate(9);
        return view('home.page.posts.index',compact('posts'));
    }
}