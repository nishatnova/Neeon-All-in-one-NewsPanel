<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*',function ($view){
            $view->with('headCategories', Category::where('status',1)->orderBy('id', 'desc')->take(7)->get(['id','name']));
        });

        View::composer('*',function ($view){
            $view->with('listCategories', Category::where('status',1)->get(['id','name']));
        });
    }
}
