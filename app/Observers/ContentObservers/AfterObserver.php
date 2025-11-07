<?php

namespace App\Observers\ContentObservers;

use App\Models\Content;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Content "saved" event.
     */
    public function saved(Content $content): void
    {
        //
    }

    /**
     * Handle the Content "created" event.
     */
    public function created(Content $content): void
    {
        BehaviorService::perform($content, 'Create');
    }

    /**
     * Handle the Content "updated" event.
     */
    public function updated(Content $content): void
    {
        BehaviorService::perform($content, 'Update');
    }

    /**
     * Handle the Content "deleted" event.
     */
    public function deleted(Content $content): void
    {
        BehaviorService::perform($content, 'Delete');
    }

    /**
     * Handle the Content "restored" event.
     */
    public function restored(Content $content): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Content $content): void
    {
        //
    }
}
