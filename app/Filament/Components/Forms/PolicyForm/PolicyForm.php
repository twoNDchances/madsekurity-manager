<?php

namespace App\Filament\Components\Forms\PolicyForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Permissions\Schemas\PermissionForm;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Rules\NameDashingRule;

trait PolicyForm
{
    use GeneralForm, PolicyAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Policy Name')
        ->helperText('Simple name with kebab case about this Policy.')
        ->rule(new NameDashingRule())
        ->unique(ignoreRecord: true)
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Policy...');
    }

    public static function users($create = true)
    {
        $field = self::select('users')
        ->helperText('Select multiple Users for Policy Definition.')
        ->relationship('users', 'email')
        ->multiple();

        return match ($create)
        {
            true  => $field->createOptionForm(UserForm::main(false)),
            false => $field,
        };
    }

    public static function permissions($create = true)
    {
        $field = self::select('permissions')
        ->helperText('Select multiple Permissions for Policy Definition.')
        ->relationship('permissions', 'name')
        ->multiple();

        return match ($create)
        {
            true  => $field->createOptionForm(PermissionForm::main(false)),
            false => $field,
        };
    }
}
