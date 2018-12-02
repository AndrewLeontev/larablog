<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use \App\Billing\Stripe;

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
            $archives = \App\Post::archives();
            $latestPosts = \App\Post::latestPosts();
            $categories = \App\Category::getAll();
            $tags = \App\Tag::pluck('name')->take(50);

            $view->with(
                compact('archives', 'latestPosts', 'categories', 'tags')
            );
        });
        view()->composer('layouts.footlatest', function($view) {
            $latestPosts = \App\Post::latestPosts();

            $view->with(compact('latestPosts'));
        });
        view()->composer('layouts.footer', function($view) {
            $tags = \App\Tag::pluck('name')->take(25);

            $view->with(compact('tags'));
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
        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
