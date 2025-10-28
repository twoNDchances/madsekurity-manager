<?php

namespace App\Observers\PolicyObservers;

use App\Models\Policy;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Policy "saving" event.
     */
    public function saving(Policy $policy): void
    {
        $policy->name = Str::slug($policy->name);
    }

    /**
     * Handle the Policy "creating" event.
     */
    public function creating(Policy $policy): void
    {
        $policy->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Policy "updating" event.
     */
    public function updating(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "deleting" event.
     */
    public function deleting(Policy $policy): void
    {
        //
    }

    /**
     * Handle the Policy "restoring" event.
     */
    public function restoring(Policy $policy): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Policy $policy): void
    {
        //
    }
}
