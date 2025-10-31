<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListEnginePreparation
{
    use GeneralAction;

    protected function getHeaderActions(): array
    {
        return [
            self::createAction(),
        ];
    }

    public function getTabs(): array
    {
        return [];
    }
}
