<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function store(Product $product, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            // 'rate' => 'required|digits_between:0,5',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#respon')->withErrors($validator)->with('status-question', 'Some message');
        }

        if (auth()->check()) {
            try {
                DB::beginTransaction();

                Question::create([

                    'user_id' => auth()->id(),
                    'text' => $request->text,
                    'product_id' => $product->id,

                ]);
                try {
                    Log::info(
                        'پرسش جدید ثبت شد',
                        [
                            'title' => 'پرسش جدید ثبت شد',
                            'body' => 'نام کاربر' . " " . Auth::user()->name . "" . Auth::user()->cellphone . " " . 'محصول' . " " . $product->name,
                            'user_id' => auth()->id(),
                            'eventable_id' => $request->id,
                            'eventable_type' => Question::class,
                        ]

                    );
                } catch (\Throwable $th) {
                    //throw $th;
                }

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('مشکل در ایجاد پرسش و پاسخ', $ex->getMessage())->showConfirmButton('تایید');
                return redirect()->back();
            }

            alert()->success('پرسش شما با موفقیت برای این محصول ثبت شد');
            return redirect()->back();
        } else {
            alert()->warning('برای ثبت پرسش ابتدا وارد سایت شوید')->showConfirmButton('تایید');
            return redirect()->back();
        }
    }

    public function replyStore(Request $request)
    {
        
         $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            // 'rate' => 'required|digits_between:0,5',
        ]);

           if ($validator->fails()) {
            alert()->warning('متن پاسخ خالی است');

            return redirect()->back();
        }

        if (auth()->check()) {
        Question::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'product_id' => $request->product,
            'parent_id' => $request->question,

        ]);
        try {
            Log::info(
                'جواب جدید ثبت شد',
                [
                    'title' => 'جواب جدید برای سوال با آیدی' . ' : ' . $request->question . ' ' . 'ثبت شد',
                    'body' => 'نام کاربر' . " " . Auth::user()->name . "" . Auth::user()->cellphone,
                    'user_id' => auth()->id(),
                    'eventable_id' => $request->id,
                    'eventable_type' => Question::class,
                ]

            );
        } catch (\Throwable $th) {
            //throw $th;
        }


        alert()->success('پاسخ شما با موفقیت برای این محصول ثبت شد')->showConfirmButton('تایید');
        return redirect()->back();

        return back();}
        else {
            alert()->warning('برای ثبت پاسخ ابتدا وارد سایت شوید')->showConfirmButton('تایید');
            return redirect()->back();
        }
    }
}