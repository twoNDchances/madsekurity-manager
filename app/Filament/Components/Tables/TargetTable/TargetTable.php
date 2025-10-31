<?php

namespace App\Filament\Components\Tables\TargetTable;

use App\Filament\Components\Generals\GeneralTable;

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
        ->numeric()
        ->badge();
    }
}
