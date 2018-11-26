<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function($view) {
            $view->with([
                'archives' => \App\Post::archives(),
                'latestPosts' => \App\Post::latestPosts()
            ]);
        });
        view()->composer('layouts.footlatest', function($view) {
            $view->with([
                'latestPosts' => \App\Post::latestPosts()
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
