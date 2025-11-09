<?php

namespace App\Filament\Components\Forms\RuleForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;

trait RuleAction
{
    use GeneralAction;

    public static function openActionForm()
    {
        return self::action(
            'open_action_form',
            'Open Action Form',
            fn () => Heroicon::OutlinedArrowTopRightOnSquare,
        )
        ->url(route('filament.manager.initialization.resources.actions.create'))
        ->openUrlInNewTab();
    }
}
