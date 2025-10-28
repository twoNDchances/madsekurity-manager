<?php

namespace App\Observers\ConfigurationObservers;

use App\Models\Configuration;

trait AfterObserver
{
    /**
     * Handle the Configuration "saved" event.
     */
    public function saved(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "created" event.
     */
    public function created(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "updated" event.
     */
    public function updated(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "deleted" event.
     */
    public function deleted(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "restored" event.
     */
    public function restored(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Configuration $configuration): void
    {
        //
    }
}
