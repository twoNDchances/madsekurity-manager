<?php

namespace App\Observers\DefenderObservers;

use App\Models\Defender;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Defender "saved" event.
     */
    public function saved(Defender $defender): void
    {
        //
    }

    /**
     * Handle the Defender "created" event.
     */
    public function created(Defender $defender): void
    {
        BehaviorService::perform($defender, 'Create');
    }

    /**
     * Handle the Defender "updated" event.
     */
    public function updated(Defender $defender): void
    {
        BehaviorService::perform($defender, 'Update');
    }

    /**
     * Handle the Defender "deleted" event.
     */
    public function deleted(Defender $defender): void
    {
        BehaviorService::perform($defender, 'Delete');
    }

    /**
     * Handle the Defender "restored" event.
     */
    public function restored(Defender $defender): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Defender $defender): void
    {
        //
    }
}
