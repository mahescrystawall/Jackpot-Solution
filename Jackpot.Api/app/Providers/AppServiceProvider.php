<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IBetService;
use App\Services\BetService;
use App\Interfaces\IProfitLossService;
use App\Services\ProfitLossService;
use App\Interfaces\IPriceValueService;
use App\Services\PriceValueService;
use App\Interfaces\IMenuService;
use App\Services\MenuService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(\App\Interfaces\IBetService::class, \App\Services\BetService::class);
        $this->app->bind(IProfitLossService::class, ProfitLossService::class);
        $this->app->bind(IPriceValueService::class, PriceValueService::class);
        $this->app->bind(IMenuService::class, MenuService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
