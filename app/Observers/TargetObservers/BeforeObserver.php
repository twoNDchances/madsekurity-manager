<?php

namespace App\Observers\TargetObservers;

use App\Models\Context;
use App\Models\Target;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Target "saving" event.
     */
    public function saving(Target $target): void
    {
        $target->name = Str::slug($target->name);

        if ($target->context_id)
        {
            $context          = Context::find($target->context_id);
            $target->datatype = $context->datatype;
        }
    }

    /**
     * Handle the Target "creating" event.
     */
    public function creating(Target $target): void
    {
        $target->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Target "updating" event.
     */
    public function updating(Target $target): void
    {
        //
    }

    /**
     * Handle the Target "deleting" event.
     */
    public function deleting(Target $target): void
    {
        //
    }

    /**
     * Handle the Target "restoring" event.
     */
    public function restoring(Target $target): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Target $target): void
    {
        //
    }
}
