<?php

namespace App\Filament\Components\Tables\DefenderTable;

use App\Filament\Components\Generals\GeneralTable;

trait DefenderTable
{
    use GeneralTable, DefenderAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function status()
    {
        return self::booleanColumn('status');
    }

    public static function url()
    {
        return self::textColumn('url',' URL')
        ->url(fn ($state) => $state)
        ->openUrlInNewTab();
    }

    public static function groups()
    {
        return self::relationshipColumn('groups.name', 'Groups');
    }

    public static function evaluators()
    {
        return self::relationshipColumn('evaluators.name', 'Evaluators');
    }
}
