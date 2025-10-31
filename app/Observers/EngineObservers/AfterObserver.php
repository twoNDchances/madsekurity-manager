<?php

namespace App\Observers\EngineObservers;

use App\Models\Engine;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Engine "saved" event.
     */
    public function saved(Engine $engine): void
    {
        //
    }

    /**
     * Handle the Engine "created" event.
     */
    public function created(Engine $engine): void
    {
        BehaviorService::perform($engine, 'Create');
    }

    /**
     * Handle the Engine "updated" event.
     */
    public function updated(Engine $engine): void
    {
        BehaviorService::perform($engine, 'Update');
    }

    /**
     * Handle the Engine "deleted" event.
     */
    public function deleted(Engine $engine): void
    {
        BehaviorService::perform($engine, 'Delete');
    }

    /**
     * Handle the Engine "restored" event.
     */
    public function restored(Engine $engine): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Engine $engine): void
    {
        //
    }
}
