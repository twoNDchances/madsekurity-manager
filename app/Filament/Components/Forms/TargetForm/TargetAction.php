<?php

namespace App\Filament\Components\Forms\TargetForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;

trait TargetAction
{
    use GeneralAction;

    public static function openEngineForm()
    {
        return self::action(
            'open_engine_form',
            'Open Engine Form',
            fn () => Heroicon::OutlinedArrowTopRightOnSquare,
        )
        ->url(route('filament.manager.positions.resources.engines.create'))
        ->openUrlInNewTab();
    }
}
