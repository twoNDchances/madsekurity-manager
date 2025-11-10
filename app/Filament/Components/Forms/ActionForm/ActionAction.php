<?php

namespace App\Filament\Components\Forms\ActionForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;

trait ActionAction
{
    use GeneralAction;

    public static function openRuleForm()
    {
        return self::action(
            'open_rule_form',
            'Open Rule Form',
            fn () => Heroicon::OutlinedArrowTopRightOnSquare,
        )
        ->url(route('filament.manager.initializations.resources.rules.create'))
        ->openUrlInNewTab();
    }
}
