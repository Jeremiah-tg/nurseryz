<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Facades\Filament;
use App\Providers\Filament\SuperAdminPanelProvider;
use App\Providers\Filament\AdminPanelProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    // App\Providers\Filament\AdminPanelProvider::class,
    // App\Providers\Filament\SuperAdminPanelProvider::class,  
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Authenticate::redirectUsing(fn() => Filament::getLoginUrl());
    }
}
