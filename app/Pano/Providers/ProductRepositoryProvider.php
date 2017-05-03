<?php

namespace App\Pano\Providers;

use App\Pano\Contracts\ProductRepositoryInterface;
use App\Pano\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( ProductRepositoryInterface::class, ProductRepository::class );
    }
}
