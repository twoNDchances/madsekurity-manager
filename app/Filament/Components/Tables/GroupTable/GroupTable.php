<?php

namespace App\Filament\Components\Tables\GroupTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\GroupSchema;

trait GroupTable
{
    use GeneralTable, GroupAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function level()
    {
        return self::textColumn('level')
        ->numeric();
    }

    public static function phase()
    {
        return self::textColumn('phase')
        ->formatStateUsing(fn ($state) => GroupSchema::$phases['options'][$state])
        ->color(fn ($state) => GroupSchema::$phases['colors'][$state])
        ->badge();
    }

    public static function rules()
    {
        return self::relationshipColumn('rules.name', 'Rules');
    }
}
