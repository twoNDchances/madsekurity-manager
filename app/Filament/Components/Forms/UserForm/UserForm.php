<?php

namespace App\Filament\Components\Forms\UserForm;

use App\Filament\Components\Generals\GeneralForm;
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
        ->required()
        ->password();
    }

    public static function canLogin()
    {
        return self::toggle('can_login', 'Can Login')
        ->helperText('Allow login for this User.')
        ->default(true)
        ->required();
    }

    public static function isAdmin()
    {
        $condition = fn ($livewire) => $livewire instanceof CreateRecord;
        return self::toggle('is_admin', 'Is Admin')
        ->helperText('Full of control the system.')
        ->required($condition)
        ->visible($condition)
        ->default(false);
    }
}
