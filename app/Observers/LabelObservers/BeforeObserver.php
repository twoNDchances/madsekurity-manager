<?php

namespace App\Observers\LabelObservers;

use App\Models\Label;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Label "saving" event.
     */
    public function saving(Label $label): void
    {
        $label->name = Str::slug($label->name);
    }

    /**
     * Handle the Label "creating" event.
     */
    public function creating(Label $label): void
    {
        $label->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Label "updating" event.
     */
    public function updating(Label $label): void
    {
        //
    }

    /**
     * Handle the Label "deleting" event.
     */
    public function deleting(Label $label): void
    {
        //
    }

    /**
     * Handle the Label "restoring" event.
     */
    public function restoring(Label $label): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Label $label): void
    {
        //
    }
}
