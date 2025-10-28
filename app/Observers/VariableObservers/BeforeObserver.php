<?php

namespace App\Observers\VariableObservers;

use App\Models\Variable;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Variable "saving" event.
     */
    public function saving(Variable $variable): void
    {
        $variable->key = Str::upper(Str::replace(
            '-',
            '_',
            Str::slug($variable->key),
        ));
    }

    /**
     * Handle the Variable "creating" event.
     */
    public function creating(Variable $variable): void
    {
        $variable->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Variable "updating" event.
     */
    public function updating(Variable $variable): void
    {
        //
    }

    /**
     * Handle the Variable "deleting" event.
     */
    public function deleting(Variable $variable): void
    {
        //
    }

    /**
     * Handle the Variable "restoring" event.
     */
    public function restoring(Variable $variable): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Variable $variable): void
    {
        //
    }
}
