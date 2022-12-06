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
        return view('home.page.users_profile.index');
    }

    public function orderList()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);
        return view('home.page.users_profile.order.orderList', compact('orders'));
    }

    public function order(Order $order)
    {
        if ($order->user_id == auth()->id()) {
            return view('home.page.users_profile.order.show', compact('order'));
        } else {
            abort(401);
        }
    }

    public function commentsList()
    {
        $comments = Comment::where('user_id', auth()->id())->latest()->paginate(10);
        return view('home.page.users_profile.comments', compact('comments'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('home.page.users_profile.editProfile', compact('user'));
    }
}
