<?php

namespace App\Filament\Components\Forms\SettingForm;

use App\Filament\Clusters\Configurations\Resources\Variables\Schemas\VariableForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Services\IdentificationService;

trait SettingForm
{
    use GeneralForm, SettingAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Setting Name')
        ->helperText('Simple name with kebab case about this Setting.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Setting...');
    }

    public static function hasVariables($create = true)
    {
        return IdentificationService::use(
            self::select('has_variables', 'Variables')
            ->relationship('hasVariables', 'key')
            ->multiple(),
            fn() => VariableForm::main(false),
            'variable',
            'modal',
            $create,
        );
    }
}
