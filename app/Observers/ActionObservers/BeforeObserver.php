<?php

namespace App\Observers\ActionObservers;

use App\Models\Action;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Action "saving" event.
     */
    public function saving(Action $action): void
    {
        $action->name          = Str::slug($action->name);
        $action->configuration = match ($action->type)
        {
            'allow' => null,
            default => $action->configuration,
        };
        $action->content_id = match ($action->type)
        {
            'deny',
            'request' => $action->content_id,
            default   => null,
        };
        $action->wordlist_id = match ($action->type)
        {
            'share',
            'header' => $action->wordlist_id,
            default  => null,
        };
    }

    /**
     * Handle the Action "creating" event.
     */
    public function creating(Action $action): void
    {
        $action->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Action "updating" event.
     */
    public function updating(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "deleting" event.
     */
    public function deleting(Action $action): void
    {
        //
    }

    /**
     * Handle the Action "restoring" event.
     */
    public function restoring(Action $action): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Action $action): void
    {
        //
    }
}
