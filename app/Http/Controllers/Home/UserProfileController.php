<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class UserProfileController extends Controller
{
    public function index()
    {
        SEOMeta::setRobots('noindex, nofollow');
        return view('home.page.users_profile.index');
    }

    public function orderList()
    {
        SEOMeta::setRobots('noindex, nofollow');
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);
        return view('home.page.users_profile.order.orderList', compact('orders'));
    }

    public function order(Order $order)
    {
        if ($order->user_id == auth()->id()) {
            SEOMeta::setRobots('noindex, nofollow');
            return view('home.page.users_profile.order.show', compact('order'));
        } else {
            abort(401);
        }
    }

    public function commentsList()
    {
        SEOMeta::setRobots('noindex, nofollow');
        $comments = Comment::where('user_id', auth()->id())->latest()->paginate(10);
        return view('home.page.users_profile.comments', compact('comments'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        SEOMeta::setRobots('noindex, nofollow');
        return view('home.page.users_profile.editProfile', compact('user'));
    }
}
