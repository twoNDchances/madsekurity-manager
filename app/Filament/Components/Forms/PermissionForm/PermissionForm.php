<?php

namespace App\Filament\Components\Forms\PermissionForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Policies\Schemas\PolicyForm;
use App\Models\Permission;
use App\Services\IdentificationService;

trait PermissionForm
{
    use GeneralForm, PermissionAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Permission Name')
        ->helperText('Simple name about this Permission.')
        ->unique(ignoreRecord: true)
        ->required();
    }

    public static function action()
    {
        return self::select('action')
        ->options(Permission::getAvailablePermissions())
        ->searchable()
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Permission...');
    }

    public static function policies($create = true)
    {
        return IdentificationService::use(
            self::select('policies')
            ->helperText('Select multiple Policies for Permission Definition.')
            ->relationship('policies', 'name')
            ->multiple(),
            fn() => PolicyForm::main(false, false),
            'policy',
            'modal',
            $create,
        );
    }
}
