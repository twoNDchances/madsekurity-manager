<?php

namespace App\Observers\SettingObservers;

use App\Models\Setting;

trait AfterObserver
{
    /**
     * Handle the Setting "saved" event.
     */
    public function saved(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "created" event.
     */
    public function created(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "updated" event.
     */
    public function updated(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "deleted" event.
     */
    public function deleted(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "restored" event.
     */
    public function restored(Setting $setting): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Setting $setting): void
    {
        //
    }
}
