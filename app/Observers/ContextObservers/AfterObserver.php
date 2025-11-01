<?php

namespace App\Observers\ContextObservers;

use App\Models\Context;
// use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Context "saved" event.
     */
    public function saved(Context $context): void
    {
        //
    }

    /**
     * Handle the Context "created" event.
     */
    public function created(Context $context): void
    {
        // BehaviorService::perform($context, 'Create');
    }

    /**
     * Handle the Context "updated" event.
     */
    public function updated(Context $context): void
    {
        // BehaviorService::perform($context, 'Update');
    }

    /**
     * Handle the Context "deleted" event.
     */
    public function deleted(Context $context): void
    {
        // BehaviorService::perform($context, 'Delete');
    }

    /**
     * Handle the Context "restored" event.
     */
    public function restored(Context $context): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Context $context): void
    {
        //
    }
}
