<?php

namespace App\Providers;

use App\Repositories\CartModelRepository;
use App\Repositories\CartRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind(CartRepository::class,function(){
            return new CartModelRepository();
        }
    );
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