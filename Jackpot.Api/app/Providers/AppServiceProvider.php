<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IBetService;
use App\Services\BetService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(\App\Interfaces\IBetService::class, \App\Services\BetService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
