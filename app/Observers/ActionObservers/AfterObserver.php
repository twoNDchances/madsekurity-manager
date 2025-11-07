<?php

namespace App\Observers\ActionObservers;

use App\Models\Action;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Action "saved" event.
     */
    public function saved(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "created" event.
     */
    public function created(Action $action): void
    {
        BehaviorService::perform($action, 'Create');
    }

    /**
     * Handle the Action "updated" event.
     */
    public function updated(Action $action): void
    {
        BehaviorService::perform($action, 'Update');
    }

    /**
     * Handle the Action "deleted" event.
     */
    public function deleted(Action $action): void
    {
        BehaviorService::perform($action, 'Delete');
    }

    /**
     * Handle the Action "restored" event.
     */
    public function restored(Action $action): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Action $action): void
    {
        //
    }
}
