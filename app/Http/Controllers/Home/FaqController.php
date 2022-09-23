<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
      return view('home.page.faq');

    }
    
    public function rules()
    {
      return view('home.page.rules');
    }
     public function privacy()
     {
      return view('home.page.privacy');
     }
}