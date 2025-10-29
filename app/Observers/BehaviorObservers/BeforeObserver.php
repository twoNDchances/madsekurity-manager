<?php

namespace App\Observers\BehaviorObservers;

use App\Models\Behavior;
use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the Behavior "saving" event.
     */
    public function saving(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "creating" event.
     */
    public function creating(Behavior $behavior): void
    {
        $behavior->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Behavior "updating" event.
     */
    public function updating(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "deleting" event.
     */
    public function deleting(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the Behavior "restoring" event.
     */
    public function restoring(Behavior $behavior): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Behavior $behavior): void
    {
        //
    }
}
