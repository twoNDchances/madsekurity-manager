<?php

namespace App\Observers\BehaviorObservers;

use App\Models\Behavior;

trait AfterObserver
{
    /**
     * Handle the Behavior "saved" event.
     */
    public function saved(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "created" event.
     */
    public function created(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "updated" event.
     */
    public function updated(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "deleted" event.
     */
    public function deleted(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "restored" event.
     */
    public function restored(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Behavior $behavior): void
    {
        //
    }
}
