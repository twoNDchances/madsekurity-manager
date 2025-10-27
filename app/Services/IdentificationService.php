<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IdentificationService
{
    public static function getUser()
    {
        return Auth::user();
    }

    public static function getId()
    {
        return self::getUser()?->id;
    }

    public static function isAdmin()
    {
        return self::getUser()?->is_admin ?? false;
    }

    public static function canLogin()
    {
        return self::getUser()?->can_login ?? false;
    }

    public static function can(User $user, string $resource, string $action)
    {
        if (!$user || !$user->email_verified_at || !$user->can_login)
        {
            return false;
        }
        if ($user->is_admin || $user->hasPermission("$resource.all"))
        {
            return true;
        }
        return $user->hasPermission("$resource.$action");
    }
}
