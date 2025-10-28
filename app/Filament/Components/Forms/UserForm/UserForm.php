<?php

namespace App\Filament\Components\Forms\UserForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Policies\Schemas\PolicyForm;
use App\Rules\EmailSendingRule;
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
        ->unique(ignoreRecord: true)
        ->required()
        ->email();
    }

    public static function password()
    {
        return self::textInput('password', placeholder: 'User Password')
        ->helperText('Strong password for authentication of User.')
        ->suffixActions(
            [
                self::generatePassword(),
                self::copyPassword(),
            ],
        )
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

    public static function mustVerify()
    {
        $condition = fn ($livewire) => $livewire instanceOf CreateRecord;
        return self::toggle('must_verify', 'Must Verify')
        ->rule(fn ($state, $get) => $state ? new EmailSendingRule($get('name'), $get('email'), $get('token')) : null)
        ->disabled(fn ($livewire) => !$condition($livewire))
        ->helperText('User must be verified before using account.')
        ->required($condition)
        ->default(false)
        ->reactive();
    }

    public static function token()
    {
        $condition = fn ($livewire, $get) => $livewire instanceOf CreateRecord && $get('must_verify') == true;
        return self::textInput('token', placeholder: 'User Token')
        ->helperText('Token for verification, autofill when leaved blank')
        ->suffixAction(self::generateToken())
        ->required($condition)
        ->visible($condition);
    }

    public static function policies($create = true)
    {
        $field = self::select('policies')
        ->helperText('Select multiple Policies for User Definition.')
        ->relationship('policies', 'name')
        ->multiple();

        return match ($create)
        {
            true  => $field->createOptionForm(PolicyForm::main(false, false)),
            false => $field,
        };
    }
}
