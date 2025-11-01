<?php

namespace App\Filament\Components\Forms\ContextForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Schemas\ContextSchema;

trait ContextForm
{
    use GeneralForm, ContextAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Context Name');
    }

    public static function phase()
    {
        return self::toggleButtons('phase', colorsAndOptions: ContextSchema::$phases);
    }

    public static function type()
    {
        return self::toggleButtons('type', colorsAndOptions: ContextSchema::$types);
    }

    public static function datatype()
    {
        return self::toggleButtons('datatype', colorsAndOptions: ContextSchema::$datatypes);
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Context...');
    }

    public static function hasTargets()
    {
        return self::select('has_targets', 'Targets')
        ->relationship('hasTargets', 'name')
        ->multiple();
    }
}
