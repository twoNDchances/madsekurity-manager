<?php

namespace App\Filament\Components\Tables\LabelTable;

use App\Filament\Components\Generals\GeneralTable;

trait LabelTable
{
    use GeneralTable, LabelAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function coloc()
    {
        return self::textColumn('color');
    }
}
