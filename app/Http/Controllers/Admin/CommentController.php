<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.comments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {

        $request->validate([
            'text' => 'required',
        ]);

        $approved = (auth()->user()->hasRole('super-admin')) ? 1 : 0;
        Comment::create([
            'parent_id' => $request->comment_id,
            'user_id' => auth()->id(),
            'text' => $request->text,
            'commentable_type' => 'App\Models\Product',
            'commentable_id' => $request->product_id,
            'approved' => $approved


        ]);

        $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');
        return redirect()->route('admin.comments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.page.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment, ToastrFactory $flasher)
    {
        $request->validate([
            'text' => 'required|min:5',
        ]);
        try {
            $comment->update([
                "text" => $request->text
            ]);

            $flasher->addSuccess('تغییرات با موفقیت ذخیره شد');
            return redirect()->route('admin.comments.index');
        } catch (\Throwable $th) {
            $flasher->addError('مشکل در تغییر');
            return redirect()->route('admin.comments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, ToastrFactory $flasher)
    {
        $comment->delete();
        $flasher->addSuccess('کامنت مورد نظر حذف شد');
        return back();
    }
}
