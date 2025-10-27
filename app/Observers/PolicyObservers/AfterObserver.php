<?php

namespace App\Observers\PolicyObservers;

use App\Models\Policy;

trait AfterObserver
{
    /**
     * Handle the Policy "saved" event.
     */
    public function saved(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "created" event.
     */
    public function created(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "updated" event.
     */
    public function updated(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "deleted" event.
     */
    public function deleted(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "restored" event.
     */
    public function restored(Policy $policy): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Policy $policy): void
    {
        //
    }
}
