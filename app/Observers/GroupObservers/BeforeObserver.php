<?php

namespace App\Observers\GroupObservers;

use App\Models\Group;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Group "saving" event.
     */
    public function saving(Group $group): void
    {
        $group->name = Str::slug($group->name);
    }

    /**
     * Handle the Group "creating" event.
     */
    public function creating(Group $group): void
    {
        $group->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Group "updating" event.
     */
    public function updating(Group $group): void
    {
        //
    }

    /**
     * Handle the Group "deleting" event.
     */
    public function deleting(Group $group): void
    {
        //
    }

    /**
     * Handle the Group "restoring" event.
     */
    public function restoring(Group $group): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Group $group): void
    {
        //
    }
}
