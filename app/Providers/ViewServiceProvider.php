<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
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
        view()->composer('front.inc.header', function($view) {
            $view->with('categories', Category::get());
            $view->with('settings', Setting::select('id', 'logo', 'favicon')->first());
        });

        view()->composer('front.inc.footer', function($view) {
            $view->with('settings', Setting::first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
