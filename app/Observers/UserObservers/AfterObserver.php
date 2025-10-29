<?php

namespace App\Observers\UserObservers;

use App\Models\User;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the User "saved" event.
     */
    public function saved(User $user): void
    {
        //
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        BehaviorService::perform($user, 'Create');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        BehaviorService::perform($user, 'Update');
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        BehaviorService::perform($user, 'Delete');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
