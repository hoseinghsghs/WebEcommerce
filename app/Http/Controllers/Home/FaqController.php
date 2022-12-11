<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function seoparameter()
    {
      $settings = Setting::findOrNew(1);
          SEOTools::setDescription($settings->description);
          SEOTools::opengraph()->setUrl(env('APP_URL'));
          OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
          OpenGraph::addProperty('site_name', env('APP_NAME'));
          OpenGraph::addProperty('locale', 'fa');
          SEOTools::opengraph()->addProperty('type', 'articles');
          SEOTools::twitter()->setSite('@likoshop_ir');
          SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo));
    }
    
    public function index()
    {
      $this->seoparameter();

      return view('home.page.faq');
    }

    public function rules()
    {
      $this->seoparameter();

      return view('home.page.rules');
    }

     public function privacy()
     {
      $this->seoparameter();
      
      return view('home.page.privacy');
     }
     
}