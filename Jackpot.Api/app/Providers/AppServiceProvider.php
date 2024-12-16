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
use App\Interfaces\IEventService;
use App\Services\EventService;
use App\Interfaces\ILoginService;
use App\Services\LoginService;
use App\Interfaces\IAccountStatementService;
use App\Services\AccountStatementService;
use App\Interfaces\IIntCasinoService;
use App\Services\IntCasinoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(IBetService::class, BetService::class);
        $this->app->bind(IProfitLossService::class, ProfitLossService::class);
        $this->app->bind(IPriceValueService::class, PriceValueService::class);
        $this->app->bind(IMenuService::class, MenuService::class);
        $this->app->bind(IEventService::class, EventService::class);
        $this->app->bind(ILoginService::class, LoginService::class);
        $this->app->bind(IAccountStatementService::class, AccountStatementService::class);
        $this->app->bind(IIntCasinoService::class, IntCasinoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
