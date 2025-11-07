<?php

namespace App\Filament\Components\Forms\VariableForm;

use App\Filament\Clusters\Configurations\Resources\Settings\Schemas\SettingForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Services\IdentificationService;

trait VariableForm
{
    use GeneralForm, VariableAction;

    public static function key()
    {
        return self::textInput('key', placeholder: 'Variable Key')
        ->helperText('Simple key with snake case combine upper case about this Variable.')
        ->unique(
            ignoreRecord: true,
            modifyRuleUsing: fn ($rule, $get) => $rule->where('setting_id', $get('setting_id')),
        )
        ->alphaDash()
        ->required();
    }

    public static function value()
    {
        return self::textArea('value', placeholder: 'Variable Value')
        ->helperText('Value can be a simple string or text.')
        ->required();
    }

    public static function isSecret()
    {
        return self::toggle('is_secret', 'Is Secret')
        ->helperText('Mark this Variable is a secret.')
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Variable...');
    }

    public static function setting($create = true)
    {
        return IdentificationService::use(
            self::select('setting_id')
            ->relationship('setting', 'name')
            ->required(),
            fn() => SettingForm::main(false),
            'setting',
            'modal',
            $create,
        );
    }
}
