<?php

namespace App\Filament\Components\Tables\VariableTable;

use App\Filament\Components\Generals\GeneralTable;
use Illuminate\Support\Str;

trait VariableTable
{
    use GeneralTable, VariableAction;

    public static function key()
    {
        return self::textColumn('key');
    }

    public static function isSecret()
    {
        return self::booleanColumn('is_secret');
    }

    public static function valueLength()
    {
        return self::textColumn('value', 'Length of Value')
        ->formatStateUsing(fn ($record) => Str::length($record->value));
    }

    public static function settingId()
    {
        return self::textColumn('setting.name', 'Setting');
    }
}
