<?php

namespace App\Filament\Components\Tables\TargetTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\TargetSchema;

trait TargetTable
{
    use GeneralTable, TargetAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function phase()
    {
        return self::textColumn('phase')
        ->formatStateUsing(fn ($state) => TargetSchema::$phases['options'][$state])
        ->color(fn ($state) => TargetSchema::$phases['colors'][$state])
        ->badge();
    }

    public static function type()
    {
        return self::textColumn('type')
        ->formatStateUsing(fn ($state) => TargetSchema::$types['options'][$state])
        ->color(fn ($state) => TargetSchema::$types['colors'][$state])
        ->badge();
    }

    public static function contextId()
    {
        return self::textColumn('context.name', 'Context');
    }

    public static function datatype()
    {
        return self::textColumn('datatype')
        ->formatStateUsing(fn ($state) => TargetSchema::$datatypes['options'][$state])
        ->color(fn ($state) => TargetSchema::$datatypes['colors'][$state])
        ->badge();
    }

    public static function wordlistId()
    {
        return self::textColumn('wordlist.name', 'Wordlist');
    }

    public static function engines()
    {
        return self::relationshipColumn('engines.name', 'Engines');
    }
}
