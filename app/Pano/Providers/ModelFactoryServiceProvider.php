<?php

namespace App\Pano\Providers;

use App\Pano\Contracts\ModelFactoryContract;
use App\Pano\Factories\ModelFactory;
use Illuminate\Support\ServiceProvider;

class ModelFactoryServiceProvider extends ServiceProvider
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
        $this->app->bind(ModelFactoryContract::class, ModelFactory::class);
    }
}
