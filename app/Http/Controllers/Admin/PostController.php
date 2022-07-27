<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Validation\Rule;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.page.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $request->whenHas('status', function ($input) use ($request) {
            $request['status'] = false;
        }, function () use ($request) {
            $request['status'] = true;
        });

        $data = $request->validate([
            'title'     => 'required|string|unique:posts',
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'body'      => 'required|string',
        ]);

        $user=auth()->id();
        $slug  = str_slug($request->title);
        $data['user_id'] = $user;
        $data['slug'] = $slug;
        $data['status'] = $request['status'];
        $post = Post::create($data);

            if (isset($request->image)) {
                $ImageController = new ImageController();
                $image_name = $ImageController->UploadeImage($request->image, "posts", 420, 660);
                $post->image()->create(['url' => "posts/$image_name"]);
            } else {
                $image_name = null;
            }
            //save image path on db

        $flasher->addSuccess('خبر با موفقیت ایجاد شد');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $image = $post->image;
        return view('admin.page.posts.edit', compact('post', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, ToastrFactory $flasher)
    {
        $request->whenHas('status', function ($input) use ($request) {
            $request['status'] = false;
        }, function () use ($request) {
            $request['status'] = true;
        });
        
        $data = $request->validate([
            'title'     => ['required', 'string', Rule::unique('posts')->ignore($post->id)],
            'image'     => 'nullable|image|mimes:jpeg,jpg,png',
            'body'      => 'required|string'
        ]);
        $slug  = str_slug($request->title);
        $data['user_id'] = auth()->id();
        $data['slug'] = $slug;
        $data['status'] = $request['status'];
        $post->update($data);
        // resize and save image

        if (isset($request->image)) {
            
            if (Storage::exists($post->image->url)) {
                Storage::delete($post->image->url);
            }
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->image, "posts", 420, 660);
            $post->image()->update(['url' => "posts/$image_name"]);
        } else {
            $image_name = null;
        }
        
        

        $flasher->addSuccess('خبر با موفقیت بروزرسانی شد');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, ToastrFactory $flasher)
    {
        if (Storage::exists($post->image->url)) {
            Storage::delete($post->image->url);
        }
        $post->image()->delete();
        $post->delete();

        $flasher->addSuccess('خبر با موفقیت حذف شد');
        return back();
    }
}