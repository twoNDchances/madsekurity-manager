<?php

namespace App\Observers\VariableObservers;

use App\Models\Variable;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Variable "saved" event.
     */
    public function saved(Variable $variable): void
    {
        //
    }

    /**
     * Handle the Variable "created" event.
     */
    public function created(Variable $variable): void
    {
        BehaviorService::perform($variable, 'Create');
    }

    /**
     * Handle the Variable "updated" event.
     */
    public function updated(Variable $variable): void
    {
        BehaviorService::perform($variable, 'Update');
    }

    /**
     * Handle the Variable "deleted" event.
     */
    public function deleted(Variable $variable): void
    {
        BehaviorService::perform($variable, 'Delete');
    }

    /**
     * Handle the Variable "restored" event.
     */
    public function restored(Variable $variable): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Variable $variable): void
    {
        //
    }
}
