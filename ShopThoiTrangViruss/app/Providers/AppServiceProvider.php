<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Manufacturer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        View::composer('user.dashboard_user', function ($view) {
            $manufacturers = Manufacturer::all();
            $view->with('manufacturers', $manufacturers);
        });
    }
}
