<?php

namespace App\Providers;

use App\Http\Requests\ProductRequest;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        //
        Paginator::useBootstrap();
        JsonResource::withoutWrapping();

    }
}