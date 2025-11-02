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
        ->formatStateUsing(fn ($state) => EngineSchema::$datatypes['options'][$state])
        ->color(fn ($state) => EngineSchema::$datatypes['colors'][$state])
        ->badge();
    }

    public static function type()
    {
        return self::textColumn('type')
        ->getStateUsing(fn ($record) => EngineSchema::$typesOfDatatypes[$record->input_datatype][$record->type]);
    }

    public static function outputDatatype()
    {
        return self::textColumn('output_datatype', 'Output Datatype')
        ->formatStateUsing(fn ($state) => EngineSchema::$datatypes['options'][$state])
        ->color(fn ($state) => EngineSchema::$datatypes['colors'][$state])
        ->badge();
    }

    public static function targets()
    {
        return self::relationshipColumn('targets.name', 'Targets');
    }
}
