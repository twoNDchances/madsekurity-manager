<?php

namespace App\Filament\Components\Forms\PolicyForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;

trait PolicyAction
{
    use GeneralAction;

    public static function openUserForm()
    {
        return self::action(
            'open_user_form',
            'Open User Form',
            fn () => Heroicon::OutlinedArrowTopRightOnSquare,
        )
        ->url(route('filament.manager.resources.users.create'))
        ->openUrlInNewTab();
    }
}
