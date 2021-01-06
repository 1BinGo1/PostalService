<?php

namespace App\Providers;

use App\Models\Dispatch;
use App\Models\DispatchHistory;
use App\Observers\DispatchObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Dispatch::observe(DispatchObserver::class);
    }
}
