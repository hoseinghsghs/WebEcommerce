<?php

namespace App\Http\Controllers\Home;

use App\Events\NotificationMessage;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\SEOMeta;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        SEOMeta::setRobots('noindex, nofollow');

        return view('home.page.comment.comments');
    }

    public function store(Product $product, Request $request)

    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:100',
            'text' => 'required|min:5|max:7000',
            'comment.*.advantages.*' => 'min:5|max:7000',
            'comment.*.disadvantages.*' => 'min:5|max:7000',
            // 'cost'=>'required|digits_between:0,5',
            // 'quality'=>'required|digits_between:0,5',
            // 'strengthss'=>'required|digits_between:0,5',
            // 'rate' => 'required|digits_between:0,5',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous())->withErrors($validator)->with('status_show', 1);
        }

        if (auth()->check()) {

            try {
                DB::beginTransaction();

                if (isset($request->comment['advantages'])) {
                    $advantages = json_encode($request->comment['advantages']);
                } else {
                    $advantages = null;
                }
                if (isset($request->comment['advantages'])) {
                    $disadvantages = json_encode($request->comment['disadvantages']);
                } else {
                    $disadvantages = null;
                }
                $comment =  Comment::create([

                    'user_id' => auth()->id(),
                    'text' => $request->text,

                    'advantages' => $advantages,
                    'disadvantages' => $disadvantages,

                    'commentable_id' => $product->id,
                    'commentable_type' => Product::class,

                ]);

                $event = Event::create([
                    'title' => '?????????? ???????? ?????? ????',
                    'body' => '?????? ??????????' . " " . Auth::user()->name . "" . Auth::user()->cellphone . " " . '??????????' . " " . $product->name,
                    'user_id' => auth()->id(),
                    'eventable_id' => $comment->id,
                    'eventable_type' => Comment::class,
                ]);

                //try {
                //    broadcast(new NotificationMessage($event))->toOthers();
                //} catch (\Throwable $th) {
                    //throw $th;
                //}
                try {
                    Log::info(
                        '?????????? ???????? ?????? ????',
                        [
                            'title' => '?????????? ???????? ?????? ????',
                            'body' => '?????? ??????????' . " " . Auth::user()->name . "" . Auth::user()->cellphone . " " . '??????????' . " " . $product->name,
                            'user_id' => auth()->id(),
                            'eventable_id' => $comment->id,
                            'eventable_type' => Comment::class,
                        ]

                    );
                } catch (\Throwable $th) {
                    //throw $th;
                }

                if ($product->rates()->where('user_id', auth()->id())->exists()) {
                    $productRate = $product->rates()->where('user_id', auth()->id())->first();
                    $productRate->update([
                        'cost' => $request->cost,
                        'quality' => $request->quality,
                        'satisfaction' => $request->satisfaction,
                    ]);
                } else {
                    ProductRate::create([
                        'user_id' => auth()->id(),
                        'product_id' => $product->id,
                        'cost' => $request->cost,
                        'quality' => $request->quality,
                        'satisfaction' => $request->satisfaction,

                    ]);
                }

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('???????? ???? ?????????? ??????', $ex->getMessage())->showConfirmButton('??????????');
                return redirect()->back();
            }

            alert()->success('?????? ?????? ???? ???????????? ???????? ?????? ?????????? ?????? ????')->showConfirmButton('??????????');
            return redirect()->back();
        } else {
            alert()->warning('???????? ?????? ?????? ?????????? ???????? ???????? ????????')->showConfirmButton('??????????');
            return redirect()->back();
        }
    }

    public function replyStore(Request $request)
    {

        Comment::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'commentable_id' => $request->product,
            'commentable_type' => Product::class,
            'parent_id' => $request->comment,

        ]);
        alert()->success('???????? ?????? ???? ???????????? ???????? ?????? ?????????? ?????? ????')->showConfirmButton('??????????');
        return redirect()->back();

        return back();
    }



    //posts comment

    public function poststore(Post $post, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#scform')->withErrors($validator)->with('status', 1);
        }

        if (auth()->check()) {
            try {
                DB::beginTransaction();

                Comment::create([

                    'user_id' => auth()->id(),
                    'text' => $request->text,
                    'commentable_id' => $post->id,
                    'commentable_type' => Post::class,

                ]);

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('???????? ???? ?????????? ??????', $ex->getMessage())->showConfirmButton('??????????');
                return redirect()->back();
            }

            alert()->success('?????? ?????? ???? ???????????? ???????? ?????? ?????? ?????? ????', '????????????')->showConfirmButton('??????????');
            return redirect()->back();
        } else {
            alert()->warning('???????? ?????? ?????? ?????????? ???????? ???????? ????????')->showConfirmButton('??????????');
            return redirect()->back();
        }
    }
}