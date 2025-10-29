<?php

namespace App\Filament\Components\Tables\LabelTable;

use App\Filament\Components\Generals\GeneralTable;
use Filament\Support\Colors\Color;

trait LabelTable
{
    use GeneralTable, LabelAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function color()
    {
        return self::colorColumn('color');
    }

    public static function preview()
    {
        return self::textColumn('preview', 'Preview')
        ->getStateUsing(fn ($record) => $record->name)
        ->color(fn ($record) => Color::hex($record->color))
        ->badge();
    }
}
