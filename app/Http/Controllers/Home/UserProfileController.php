<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id', auth()->id())->get();
        $comments= Comment::where('user_id', auth()->id())->where('approved' , 1)->get();
        return view('home.page.users_profile.index' , compact('comments' , 'orders'));
    }
    public function order(Order $order) 
    {
        return view('home.page.order.show' , compact('order'));
    }
}