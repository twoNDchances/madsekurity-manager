<?php

namespace App\Filament\Components\Tables\EngineTable;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;

trait EngineAction
{
    use GeneralAction;

    public static function openEngineForm()
    {
        return self::action('open_engine_form', 'Edit', Heroicon::OutlinedPencilSquare)
        ->url(fn ($record) => '')
        ->color('primary')
        ->openUrlInNewTab();
    }
}
