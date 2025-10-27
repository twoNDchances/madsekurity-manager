<?php

namespace App\Observers\PermissionObservers;

use App\Models\Permission;
use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the Permission "saving" event.
     */
    public function saving(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "creating" event.
     */
    public function creating(Permission $permission): void
    {
        $permission->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Permission "updating" event.
     */
    public function updating(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleting" event.
     */
    public function deleting(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restoring" event.
     */
    public function restoring(Permission $permission): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Permission $permission): void
    {
        //
    }
}
