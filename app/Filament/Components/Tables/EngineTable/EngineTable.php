<?php

namespace App\Filament\Components\Tables\EngineTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\EngineSchema;

trait EngineTable
{
    use GeneralTable, EngineAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function inputDatatype()
    {
        return self::textColumn('input_datatype', 'Input Datatype')
        ->color(fn ($state) => EngineSchema::$datatypes['colors'][$state])
        ->badge();
    }

    public static function type()
    {
        return self::textColumn('type');
    }

    public static function outputDatatype()
    {
        return self::textColumn('output_datatype', 'Output Datatype')
        ->color(fn ($state) => EngineSchema::$datatypes['colors'][$state])
        ->badge();
    }
}
