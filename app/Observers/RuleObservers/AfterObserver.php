<?php

namespace App\Observers\RuleObservers;

use App\Models\Rule;
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the Rule "saved" event.
     */
    public function saved(Rule $rule): void
    {
        //
    }

    /**
     * Handle the Rule "created" event.
     */
    public function created(Rule $rule): void
    {
        BehaviorService::perform($rule, 'Create');
    }

    /**
     * Handle the Rule "updated" event.
     */
    public function updated(Rule $rule): void
    {
        BehaviorService::perform($rule, 'Update');
    }

    /**
     * Handle the Rule "deleted" event.
     */
    public function deleted(Rule $rule): void
    {
        BehaviorService::perform($rule, 'Delete');
    }

    /**
     * Handle the Rule "restored" event.
     */
    public function restored(Rule $rule): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(Rule $rule): void
    {
        //
    }
}
