<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    //auth()->id()=1
    public function add(Product $product)
    {    
        if (auth()->check()) {

            $wishlist = WishList::where("user_id" ,'=', auth()->id())->where("product_id",'=', $product->id)->first();
           
            if ($wishlist) {
                Wishlist::where('product_id', $product->id)->where('user_id', auth()->id())->delete();
                return response(['errors' => 'deleted']);
            }else {
                Wishlist::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id
                ]);
                return response(['errors' => 'saved']);
            }
             
        } else {
            return response(['errors' => 'sign']);
        }
    }

    public function show(){
        return view('home.pages.UserProfile.wish_list');
    }

    public function usersProfileIndex()
    {
       
        $wishlist = Wishlist::where('user_id' , auth()->id())->get();
        
        return view('home.page.users_profile.wishlist' , compact('wishlist'));
    }
}