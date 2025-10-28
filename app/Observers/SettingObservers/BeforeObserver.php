<?php

namespace App\Observers\SettingObservers;

use App\Models\Setting;
use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the Setting "saving" event.
     */
    public function saving(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "creating" event.
     */
    public function creating(Setting $setting): void
    {
        $setting->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Setting "updating" event.
     */
    public function updating(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "deleting" event.
     */
    public function deleting(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "restoring" event.
     */
    public function restoring(Setting $setting): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Setting $setting): void
    {
        //
    }
}
