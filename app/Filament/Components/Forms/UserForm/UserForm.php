<?php

namespace App\Filament\Components\Forms\UserForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Policies\Schemas\PolicyForm;
use App\Services\IdentificationService;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

trait UserForm
{
    use GeneralForm, UserAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'User Name')
        ->helperText('Simple name about this User.')
        ->required();
    }

    public static function email()
    {
        return self::textInput('email', placeholder: 'User Email')
        ->prefixIcon(fn () => Heroicon::OutlinedAtSymbol)
        ->helperText('Unique email for this User.')
        ->required()
        ->email();
    }

    public static function password()
    {
        return self::textInput('password', placeholder: 'User Password')
        ->helperText('Strong password for authentication of User.')
        ->suffixActions(self::passwordAction())
        ->minLength(4)
        ->revealable()
        ->required(fn ($livewire) => $livewire instanceof CreateRecord)
        ->password();
    }

    public static function canLogin()
    {
        return self::toggle('can_login', 'Can Login')
        ->helperText('Allow login for this User.')
        ->default(true)
        ->required();
    }

    public static function isImportant()
    {
        $condition = fn ($livewire) => $livewire instanceof CreateRecord || IdentificationService::isImportant();
        return self::toggle('is_important', 'Is Important')
        ->helperText('Full of control the system.')
        ->required($condition)
        ->visible($condition)
        ->default(false);
    }

    public static function policies($create = true)
    {
        $field = self::select('policies')
        ->relationship('policies', 'name')
        ->multiple();

        return match ($create)
        {
            true  => $field->createOptionForm(PolicyForm::main(false, false)),
            false => $field,
        };
    }
}
