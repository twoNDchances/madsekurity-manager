<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use App\Services\IdentificationService;

class SettingPolicy
{
    private function getResource(User $user, string $action)
    {
        return IdentificationService::can($user, 'setting', $action);
    }

    /**
     * Determine whether the user can use all models.
     */
    public function all(User $user): bool
    {
        return $this->getResource($user, 'all');
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->getResource($user, 'viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Setting $setting): bool
    {
        return $this->getResource($user, 'view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->getResource($user, 'create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Setting $setting): bool
    {
        return $this->getResource($user, 'update');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $this->getResource($user, 'deleteAny');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Setting $setting): bool
    {
        return $this->getResource($user, 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Setting $setting): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Setting $setting): bool
    {
        return false;
    }
}
