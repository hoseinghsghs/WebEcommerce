<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Province;
use App\Models\UserAddress;
use Cart;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class CartController extends Controller
{
    public function add(Request $request)   
    {
       
        
        $request->validate([
            'product' => 'required',
            'qtybutton' => 'required'
        ]);

        $product = Product::findOrFail($request->product);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qtybutton > $productVariation->quantity) {
            
            response( 'success', 404 );
        }

        $rowId = $product->id . '-' . $productVariation->id;

        if (Cart::get($rowId) == null) {
            Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $productVariation->is_sale ? $productVariation->sale_price : $productVariation->price,
                'quantity' => $request->qtybutton,
                'attributes' => $productVariation->toArray(),
                'associatedModel' => $product
            ));
           return response()->json(['product'=>$product,'rowId'=>$rowId , 'cart' => Cart::getContent($rowId) , 'rowId' =>$rowId , 'all_cart' => Cart::getTotal()],200);    
        } 
        else {
           return response( 'success', 201 );
        }
    }
    
    public function index()
    {
    return view('home.page.cart.index');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        $prices=Cart::getTotal();
        return response($prices , 200);
    }

    public function checkout()
    {
        if (\Cart::isEmpty()) {
            alert()->warning('سبد خرید شما خالی میباشد');
            return redirect()->route('home');
        }

        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $provinces = Province::all();

        return view('home.page.cart.checkout', compact('addresses' , 'provinces'));
    }

}