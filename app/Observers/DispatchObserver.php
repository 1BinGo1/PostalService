<?php

namespace App\Observers;

use App\Models\Dispatch;
use App\Models\DispatchHistory;

class DispatchObserver
{

    public function saving(Dispatch $dispatch){
        $old_dispatch = Dispatch::query()->findOrFail($dispatch->id);
        if ($old_dispatch->status != $dispatch->status){
            DispatchHistory::query()->create([
                'dispatch_id' => $dispatch->id,
                'status' => $dispatch->status,
                'city_dispatch' => $dispatch->city_dispatch,
                'city_destination' => $dispatch->city_destination
            ]);
        }
    }


    /**
     * Handle the Dispatch "created" event.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return void
     */
    public function created(Dispatch $dispatch)
    {
        //
    }

    /**
     * Handle the Dispatch "updated" event.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return void
     */
    public function updated(Dispatch $dispatch)
    {
        //
    }

    /**
     * Handle the Dispatch "deleted" event.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return void
     */
    public function deleted(Dispatch $dispatch)
    {
        //
    }

    /**
     * Handle the Dispatch "restored" event.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return void
     */
    public function restored(Dispatch $dispatch)
    {
        //
    }

    /**
     * Handle the Dispatch "force deleted" event.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return void
     */
    public function forceDeleted(Dispatch $dispatch)
    {
        //
    }
}
