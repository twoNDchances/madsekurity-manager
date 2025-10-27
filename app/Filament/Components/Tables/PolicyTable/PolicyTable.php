<?php

namespace App\Filament\Components\Tables\PolicyTable;

use App\Filament\Components\Generals\GeneralTable;

trait PolicyTable
{
    use GeneralTable, PolicyAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function users()
    {
        return self::relationshipColumn('users.email', 'Users');
    }

    public static function permissions()
    {
        return self::relationshipColumn('permissions.name', 'Permissions');
    }
}
