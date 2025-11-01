<?php

namespace App\Observers\EngineObservers;

use App\Models\Engine;
use App\Schemas\EngineSchema;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Engine "saving" event.
     */
    public function saving(Engine $engine): void
    {
        $engine->name = Str::slug($engine->name);

        if (!in_array($engine->type, ['indexOf', ...EngineSchema::$typesOfDatatypes['number'], 'hash']))
        {
            $engine->configuration = null;
        }
    }

    /**
     * Handle the Engine "creating" event.
     */
    public function creating(Engine $engine): void
    {
        $engine->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Engine "updating" event.
     */
    public function updating(Engine $engine): void
    {
        //
    }

    /**
     * Handle the Engine "deleting" event.
     */
    public function deleting(Engine $engine): void
    {
        //
    }

    /**
     * Handle the Engine "restoring" event.
     */
    public function restoring(Engine $engine): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Engine $engine): void
    {
        //
    }
}
