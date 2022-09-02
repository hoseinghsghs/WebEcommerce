<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home.partial.Header', function($view) {
            $categories = Category::where('parent_id', 0)->where('is_active', 1)->get();
            $view->with([
                'categories' => $categories,
            ]);
        });
        view()->composer('home.partial.Footer', function($view) {
            $services = Service::all();
            $view->with([
                'services' => $services,
            ]);
        });
    }
}
