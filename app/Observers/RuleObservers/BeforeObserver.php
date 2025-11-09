<?php

namespace App\Observers\RuleObservers;

use App\Models\Rule;
use App\Schemas\RuleSchema;
use App\Services\IdentificationService;
use Illuminate\Support\Str;

trait BeforeObserver
{
    /**
     * Handle the Rule "saving" event.
     */
    public function saving(Rule $rule): void
    {
        $rule->name        = Str::slug($rule->name);
        $rule->wordlist_id = match (in_array($rule->comparator, RuleSchema::$conditions['wordlist']))
        {
            true  => $rule->wordlist_id,
            false => null,
        };
    }

    /**
     * Handle the Rule "creating" event.
     */
    public function creating(Rule $rule): void
    {
        $rule->user_id = IdentificationService::getId();
    }

    /**
     * Handle the Rule "updating" event.
     */
    public function updating(Rule $rule): void
    {
        //
    }

    /**
     * Handle the Rule "deleting" event.
     */
    public function deleting(Rule $rule): void
    {
        //
    }

    /**
     * Handle the Rule "restoring" event.
     */
    public function restoring(Rule $rule): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting(Rule $rule): void
    {
        //
    }
}
