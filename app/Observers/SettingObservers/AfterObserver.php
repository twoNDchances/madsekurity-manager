<?php

namespace App\Observers\SettingObservers;

use App\Models\Setting;
use App\Services\BehaviorService;

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
        BehaviorService::perform($setting, 'Create');
    }

    /**
     * Handle the Setting "updated" event.
     */
    public function updated(Setting $setting): void
    {
        BehaviorService::perform($setting, 'Update');
    }

    /**
     * Handle the Setting "deleted" event.
     */
    public function deleted(Setting $setting): void
    {
        BehaviorService::perform($setting, 'Delete');
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
