<?php

namespace App\Observers\PermissionObservers;

use App\Models\Permission;

trait AfterObserver
{
    /**
     * Handle the Permission "saved" event.
     */
    public function saved(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "created" event.
     */
    public function created(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restored" event.
     */
    public function restored(Permission $permission): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Permission $permission): void
    {
        //
    }
}
