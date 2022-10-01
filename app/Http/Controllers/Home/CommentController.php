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

class CommentController extends Controller
{
    public function create(Request $request){
        
        return view('home.page.comment.comments');
        
    }

    public function store(Product $product , Request $request)

    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            'comment.*.advantages.*' => 'min:5|max:7000',
            'comment.*.disadvantages.*' => 'min:5|max:7000',
           
            // 'cost'=>'required|digits_between:0,5',
            // 'quality'=>'required|digits_between:0,5',
            // 'strengthss'=>'required|digits_between:0,5',
            // 'rate' => 'required|digits_between:0,5', 
        ]);
        
        if ($validator->fails()) {
            return redirect()->to(url()->previous())->withErrors($validator)->with('status' , 1);
        }

        if (auth()->check()) {
            try {
                DB::beginTransaction();

              $comment=  Comment::create([

                    'user_id' => auth()->id(),
                    'text' => $request->text,
                    
                    'advantages' =>json_encode($request->comment['advantages']),
                    'disadvantages' =>json_encode($request->comment['disadvantages']) ,

                    'commentable_id' => $product->id,
                    'commentable_type' => Product::class,
                 
                ]);


                $event= Event::create([
                    'title' => 'کامنت جدید ثبت شد',
                    'body' => 'نام کاربر' . " " . Auth::user()->name . "" . Auth::user()->cellphone . " ". 'محصول' ." ".$product->name ,
                    'user_id' => auth()->id(),
                    'eventable_id' =>$comment->id,
                    'eventable_type' => Comment::class,
                ]);
                
                try {
                    broadcast(new NotificationMessage($event))->toOthers();
                } catch (\Throwable $th) {
                    //throw $th;
                }
               try {
                Log::info('کامنت جدید ثبت شد',
                [
                    'title' => 'کامنت جدید ثبت شد',
                    'body' => 'نام کاربر' . " " . Auth::user()->name . "" . Auth::user()->cellphone . " ". 'محصول' ." ".$product->name ,
                    'user_id' => auth()->id(),
                    'eventable_id' =>$comment->id,
                    'eventable_type' => Comment::class,
                ]
                
                );
               } catch (\Throwable $th) {
                //throw $th;
               }

                if ($product->rates()->where('user_id', auth()->id())->exists()) {
                    $productRate = $product->rates()->where('user_id', auth()->id())->first();
                    $productRate->update([
                        'cost'=>$request->cost,
                        'quality'=>$request->quality,
                        'satisfaction'=>$request->satisfaction,
                    ]);
                } else {
                    ProductRate::create([
                        'user_id' => auth()->id(),
                        'product_id' => $product->id,
                        'cost'=>$request->cost,
                        'quality'=>$request->quality,
                        'satisfaction'=>$request->satisfaction,
                        
                    ]);
                }

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('مشکل در ایجاد پست', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }

            alert()->success('نظر شما با موفقیت برای این محصول ثبت شد', 'باتشکر');
            return redirect()->back();
        } else {
            alert()->warning('برای ثبت نظر ابتدا وارد سایت شوید')->persistent('حله');
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
        alert()->success('پاسخ شما با موفقیت برای این محصول ثبت شد', 'باتشکر');
        return redirect()->back();
   
        return back();
    }
   


    //posts comment
    
    public function poststore(Post $post , Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
        ]);
        
        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#scform')->withErrors($validator)->with('status' , 1);
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
                alert()->error('مشکل در ایجاد پست', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }

            alert()->success('نظر شما با موفقیت برای این پست ثبت شد', 'باتشکر');
            return redirect()->back();
        } else {
            alert()->warning('برای ثبت نظر ابتدا وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

}