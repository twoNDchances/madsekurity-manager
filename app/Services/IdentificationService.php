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

    public static function isImportant()
    {
        return self::getUser()?->is_important ?? false;
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
        if ($user->is_important || $user->hasPermission("$resource.all"))
        {
            return true;
        }
        return $user->hasPermission("$resource.$action");
    }

    public static function use($field, $definition, $resource, $type, $create = true)
    {
        $user = self::getUser();
        if (!self::can($user, $resource, 'viewAny'))
        {
            $field = $field->disabled();
        }
        if (self::can($user, $resource, 'create'))
        {
            if ($create)
            {
                $field = match ($type)
                {
                    'modal' => $field->createOptionForm($definition),
                    'open'  => $field->suffixAction($definition),
                    default => $field,
                };
            }
        }
        return $field;
    }
}
