<?php

namespace App\Filament\Components\Forms\TargetForm;

use App\Filament\Components\Generals\GeneralForm;

trait TargetForm
{
    use GeneralForm, TargetAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Target Name')
        ->helperText('Simple name with kebab case about this Target.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }
}
