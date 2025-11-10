<?php

namespace App\Observers\GroupObservers;

use App\Models\Group;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Group "saved" event.
     */
    public function saved(Group $group): void
    {
        //
    }

    /**
     * Handle the Group "created" event.
     */
    public function created(Group $group): void
    {
        BehaviorService::perform($group, 'Create');
    }

    /**
     * Handle the Group "updated" event.
     */
    public function updated(Group $group): void
    {
        BehaviorService::perform($group, 'Update');
    }

    /**
     * Handle the Group "deleted" event.
     */
    public function deleted(Group $group): void
    {
        BehaviorService::perform($group, 'Delete');
    }

    /**
     * Handle the Group "restored" event.
     */
    public function restored(Group $group): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Group $group): void
    {
        //
    }
}
