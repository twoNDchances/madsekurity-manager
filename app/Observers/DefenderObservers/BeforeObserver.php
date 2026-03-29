<?php

namespace App\Observers\DefenderObservers;

use App\Models\Defender;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Defender "saving" event.
     */
    public function saving(Defender $defender): void
    {
        $defender->name = Str::slug($defender->name);
    }

    /**
     * Handle the Defender "creating" event.
     */
    public function creating(Defender $defender): void
    {
        $defender->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Defender "updating" event.
     */
    public function updating(Defender $defender): void
    {
        //
    }

    /**
     * Handle the Defender "deleting" event.
     */
    public function deleting(Defender $defender): void
    {
        //
    }

    /**
     * Handle the Defender "restoring" event.
     */
    public function restoring(Defender $defender): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Defender $defender): void
    {
        //
    }
}
