<?php

namespace App\Filament\Components\Tables\SettingTable;

use App\Filament\Components\Generals\GeneralTable;

trait SettingTable
{
    use GeneralTable, SettingAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function hasVariables()
    {
        return self::relationshipColumn('hasVariables.key', 'Variables');
    }
}
