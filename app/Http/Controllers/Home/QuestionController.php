<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function store(Product $product , Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            // 'rate' => 'required|digits_between:0,5', 
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#respon')->withErrors($validator);
        }
        
        if (auth()->check()) {
            try {
                DB::beginTransaction();

                Question::create([

                    'user_id' => auth()->id(),
                    'text' => $request->text,
                    'product_id' => $product->id,
                 
                ]);
                
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('مشکل در ایجاد پرسش و پاسخ', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }

            alert()->success('پرسش شما با موفقیت برای این محصول ثبت شد', 'باتشکر');
            return redirect()->back();
        } else {
            alert()->warning('برای ثبت پرسش ابتدا وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

    public function replyStore(Request $request)
    {
        
        Question::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'product_id' => $request->product,
            'parent_id' => $request->question,
          
        ]);
        alert()->success('پاسخ شما با موفقیت برای این محصول ثبت شد', 'باتشکر');
        return redirect()->back();
   
        return back();
    }
    
   
   
}