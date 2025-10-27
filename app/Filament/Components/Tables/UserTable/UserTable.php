<?php

namespace App\Filament\Components\Tables\UserTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Models\User;
use App\Services\IdentificationService;

trait UserTable
{
    use GeneralTable, UserAction;

    public static function email()
    {
        return self::textColumn('email')
        ->description(fn ($record) => $record->name);
    }

    public static function canLogin()
    {
        return self::booleanColumn('can_login', 'Can Login');
    }

    public static function query()
    {
        $currentUserId = IdentificationService::getId();
        $query = User::query()->whereNot('id', $currentUserId);
        if (!IdentificationService::isAdmin())
        {
            return $query->where('user_id', $currentUserId);
        }
        return $query;
    }
}
