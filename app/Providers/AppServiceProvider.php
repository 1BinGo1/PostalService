<?php

namespace App\Providers;

use App\Models\Dispatch;
use App\Models\DispatchHistory;
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
        Dispatch::updating(function ($dispatch){
            $old_dispatch = Dispatch::query()->findOrFail($dispatch->id);
            if ($old_dispatch->status != $dispatch->status){
                DispatchHistory::query()->create([
                    'dispatch_id' => $dispatch->id,
                    'status' => $dispatch->status,
                    'city_dispatch' => $dispatch->city_dispatch,
                    'city_destination' => $dispatch->city_destination
                ]);
            }
        });
    }
}
