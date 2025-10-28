<?php

namespace App\Filament\Components\Forms\UserForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;
use Webbingbrasil\FilamentCopyActions\Actions\CopyAction;

trait UserAction
{
    use GeneralAction;

    protected static function generatePassword()
    {
        return self::action(
            'generate_password',
            'Generate Password',
            Heroicon::OutlinedArrowPath,
            fn ($set) => $set('password', Str::random(16))
        );
    }

    public static function copyPassword()
    {
        return CopyAction::make();
    }

    protected static function generateToken()
    {
        return self::action(
            'generate_token',
            'Generate Token',
            Heroicon::OutlinedArrowPath,
            fn ($set) => $set('token', (string) Str::uuid()),
        );
    }
}
