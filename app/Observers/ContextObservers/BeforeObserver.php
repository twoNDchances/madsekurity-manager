<?php

namespace App\Observers\ContextObservers;

use App\Models\Context;
// use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the Context "saving" event.
     */
    public function saving(Context $context): void
    {
        //
    }

    /**
     * Handle the Context "creating" event.
     */
    public function creating(Context $context): void
    {
        // $context->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Context "updating" event.
     */
    public function updating(Context $context): void
    {
        //
    }

    /**
     * Handle the Context "deleting" event.
     */
    public function deleting(Context $context): void
    {
        //
    }

    /**
     * Handle the Context "restoring" event.
     */
    public function restoring(Context $context): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Context $context): void
    {
        //
    }
}
