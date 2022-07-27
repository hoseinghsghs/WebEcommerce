<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function add(Product $product)
    {
        if (session()->has('compareProducts')) {
            if (in_array($product->id, session()->get('compareProducts'))) {
                foreach (session()->get('compareProducts') as $key => $item) {
                    if ($item == $product->id) {
                        session()->pull('compareProducts.' . $key);
                    }
                }
                if (session()->get('compareProducts') == []) {
                    session()->forget('compareProducts');
                }
                return response(['errors' => 'deleted']);
            }
            else{
              session()->push('compareProducts', $product->id);  
              return response(['errors' => 'saved']);
            };
        } else {
            session()->put('compareProducts', [$product->id]);
            return response(['errors' => 'saved']);
        }
    }

    public function index()
    {   
        
        if (session()->has('compareProducts')) {

            $products = Product::findOrFail(session()->get('compareProducts'));

            return view('home.page.compare.index', compact('products'));
        }

        alert()->warning('لیست علاقه مندی خالی است');
        return redirect()->back();
        
    }
    
    public function remove($prodcutId)
    {
        if (session()->has('compareProducts')) {
            foreach (session()->get('compareProducts') as $key => $item) {
                if ($item == $prodcutId) {
                    session()->pull('compareProducts.' . $key);
                }
            }
            if (session()->get('compareProducts') == []) {
                session()->forget('compareProducts');
                return redirect()->route('home');
            }
            alert()->warning('محصول حذف شد');

            return redirect()->route('home.compare.index');
        }

        alert()->warning('ابتدا محصول را به لیست مقایسه اضافه کنید');
        return redirect()->back();
    }
}