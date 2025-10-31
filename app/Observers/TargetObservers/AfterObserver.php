<?php

namespace App\Observers\TargetObservers;

use App\Models\Target;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Target "saved" event.
     */
    public function saved(Target $target): void
    {
        //
    }

    /**
     * Handle the Target "created" event.
     */
    public function created(Target $target): void
    {
        BehaviorService::perform($target, 'Create');
    }

    /**
     * Handle the Target "updated" event.
     */
    public function updated(Target $target): void
    {
        BehaviorService::perform($target, 'Update');
    }

    /**
     * Handle the Target "deleted" event.
     */
    public function deleted(Target $target): void
    {
        BehaviorService::perform($target, 'Delete');
    }

    /**
     * Handle the Target "restored" event.
     */
    public function restored(Target $target): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Target $target): void
    {
        //
    }
}
