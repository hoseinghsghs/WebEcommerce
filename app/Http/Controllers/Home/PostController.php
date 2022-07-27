<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $posts=Post::where('status' , 1)->latest()->take(3)->get();
        return view('home.page.posts.show' , compact('post' , 'posts'));
    }
    public function index()
    {
        $posts=Post::where('status' , 1)->latest()->paginate(6);
        return view('home.page.posts.index' , compact('posts'));
    }
}