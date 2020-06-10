<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Sharing categories to all views for menu header and footer display
        View::share('categories', Category::orderBy('display_order')->get() );
    }
}
