<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GeoLocationServiceInterface;
use App\Services\GeoLocationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GeoLocationServiceInterface::class, GeoLocationService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
