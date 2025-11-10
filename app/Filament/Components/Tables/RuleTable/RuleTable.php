<?php

namespace App\Filament\Components\Tables\RuleTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\RuleSchema;

trait RuleTable
{
    use GeneralTable, RuleAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function phase()
    {
        return self::textColumn('phase')
        ->formatStateUsing(fn ($state) => RuleSchema::$phases['options'][$state])
        ->color(fn ($state) => RuleSchema::$phases['colors'][$state])
        ->badge();
    }

    public static function targetId()
    {
        return self::relationshipColumn('target.name', 'Target');
    }

    public static function comparator()
    {
        return self::textColumn('comparator')
        ->formatStateUsing(fn ($state) => RuleSchema::$comparators['options'][$state]);
    }

    public static function wordlistId()
    {
        return self::relationshipColumn('wordlist.name', 'Wordlist');
    }

    public static function actions()
    {
        return self::relationshipColumn('actions.name', 'Actions');
    }

    public static function groups()
    {
        return self::relationshipColumn('groups.name', 'Groups');
    }
}
