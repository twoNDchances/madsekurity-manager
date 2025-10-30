<?php

namespace App\Filament\Components\Forms\LabelForm;

use App\Filament\Components\Generals\GeneralForm;

trait LabelForm
{
    use GeneralForm, LabelAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Label Name')
        ->helperText('Simple name with kebab case about this Label.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function color()
    {
        return self::colorPicker('color')
        ->helperText('A color for Label identity, make badge for any resources.')
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Label...');
    }
}
