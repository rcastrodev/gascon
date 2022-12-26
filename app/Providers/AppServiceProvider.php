<?php

namespace App\Providers;

use App\Data;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share([
            'data'          => Data::first(),
            'gCategories'   => Category::orderBy('order', 'ASC')->get()
        ]);
    }
}
