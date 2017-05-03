<?php

namespace App\Pano\Providers;

use App\Pano\Contracts\SearchRepositoryInterface;
use App\Pano\Repositories\SearchRepository;
use Illuminate\Support\ServiceProvider;

class SearchRepositoryProvider extends ServiceProvider
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
        $this->app->bind(SearchRepositoryInterface::class, SearchRepository::class);
    }
}
