<?php

namespace App\Providers;

use App\Services\Cart\CartService;
use App\Services\Product\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ProductService', function (){
            return new ProductService();
        });
        $this->app->bind('CartService', function (){
            return new CartService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
