<?php

namespace App\Observers\ContentObservers;

use App\Models\Content;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Content "saving" event.
     */
    public function saving(Content $content): void
    {
        $content->name   = Str::slug($content->name);
        $content->length = Str::length($content->raw);
    }

    /**
     * Handle the Content "creating" event.
     */
    public function creating(Content $content): void
    {
        $content->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Content "updating" event.
     */
    public function updating(Content $content): void
    {
        //
    }

    /**
     * Handle the Content "deleting" event.
     */
    public function deleting(Content $content): void
    {
        //
    }

    /**
     * Handle the Content "restoring" event.
     */
    public function restoring(Content $content): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Content $content): void
    {
        //
    }
}
