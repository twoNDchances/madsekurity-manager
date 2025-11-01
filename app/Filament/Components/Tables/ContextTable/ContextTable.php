<?php

namespace App\Filament\Components\Tables\ContextTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\ContextSchema;

trait ContextTable
{
    use GeneralTable, ContextAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function phase()
    {
        return self::textColumn('phase')
        ->formatStateUsing(fn ($state) => ContextSchema::$phases['options'][$state])
        ->color(fn ($state) => ContextSchema::$phases['colors'][$state])
        ->badge();
    }

    public static function type()
    {
        return self::textColumn('type')
        ->formatStateUsing(fn ($state) => ContextSchema::$types['options'][$state])
        ->color(fn ($state) => ContextSchema::$types['colors'][$state])
        ->badge();
    }

    public static function datatype()
    {
        return self::textColumn('datatype')
        ->formatStateUsing(fn ($state) => ContextSchema::$datatypes['options'][$state])
        ->color(fn ($state) => ContextSchema::$datatypes['colors'][$state])
        ->badge();
    }

    public static function hasTargets()
    {
        return self::textColumn('hasTargets.name', 'Targets');
    }
}
