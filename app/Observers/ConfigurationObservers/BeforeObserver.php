<?php

namespace App\Observers\ConfigurationObservers;

use App\Models\Configuration;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Configuration "saving" event.
     */
    public function saving(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "creating" event.
     */
    public function creating(Configuration $configuration): void
    {
        $configuration->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Configuration "updating" event.
     */
    public function updating(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "deleting" event.
     */
    public function deleting(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the Configuration "restoring" event.
     */
    public function restoring(Configuration $configuration): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Configuration $configuration): void
    {
        //
    }
}
