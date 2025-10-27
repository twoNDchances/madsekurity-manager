<?php

namespace App\Observers\UserObservers;

use App\Models\User;
use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the User "saving" event.
     */
    public function saving(User $user): void
    {
        //
    }

    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        $user->user_id = IdentificationService::getId();
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleting" event.
     */
    public function deleting(User $user): void
    {
        //
    }

    /**
     * Handle the User "restoring" event.
     */
    public function restoring(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(User $user): void
    {
        //
    }
}
