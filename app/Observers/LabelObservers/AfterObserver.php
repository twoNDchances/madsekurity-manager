<?php

namespace App\Observers\LabelObservers;

use App\Models\Label;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Label "saved" event.
     */
    public function saved(Label $label): void
    {
        //
    }

    /**
     * Handle the Label "created" event.
     */
    public function created(Label $label): void
    {
        BehaviorService::perform($label, 'Create');
    }

    /**
     * Handle the Label "updated" event.
     */
    public function updated(Label $label): void
    {
        BehaviorService::perform($label, 'Update');
    }

    /**
     * Handle the Label "deleted" event.
     */
    public function deleted(Label $label): void
    {
        BehaviorService::perform($label, 'Delete');
    }

    /**
     * Handle the Label "restored" event.
     */
    public function restored(Label $label): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Label $label): void
    {
        //
    }
}
