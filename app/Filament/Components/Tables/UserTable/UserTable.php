<?php

namespace App\Filament\Components\Tables\UserTable;

use App\Filament\Components\Generals\GeneralTable;

trait UserTable
{
    use GeneralTable, UserAction;

    public static function email()
    {
        return self::textColumn('email')
        ->description(fn ($record) => $record->name);
    }

    public static function isVerified()
    {
        return self::booleanColumn('email_verified_at', 'Is Verified')
        ->getStateUsing(fn ($record) => $record->email_verified_at ? true : false);
    }

    public static function canLogin()
    {
        return self::booleanColumn('can_login', 'Can Login');
    }

    public static function policies()
    {
        return self::relationshipColumn('policies.name', 'Policies');
    }
}
