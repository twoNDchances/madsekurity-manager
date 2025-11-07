<?php

namespace App\Filament\Components\Forms\PolicyForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Permissions\Schemas\PermissionForm;
use App\Services\IdentificationService;

trait PolicyForm
{
    use GeneralForm, PolicyAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Policy Name')
        ->helperText('Simple name with kebab case about this Policy.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Policy...');
    }

    public static function users($create = true)
    {
        return IdentificationService::use(
            self::select('users')
            ->helperText('Select multiple Users for Policy Definition.')
            ->relationship('users', 'email')
            ->multiple(),
            fn() => self::openUserForm(),
            'user',
            'open',
            $create,
        );
    }

    public static function permissions($create = true)
    {
        return IdentificationService::use(
            self::select('permissions')
            ->helperText('Select multiple Permissions for Policy Definition.')
            ->relationship('permissions', 'name')
            ->multiple(),
            fn() => PermissionForm::main(false),
            'permission',
            'modal',
            $create,
        );
    }
}
