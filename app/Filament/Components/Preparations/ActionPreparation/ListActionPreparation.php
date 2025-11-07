<?php

namespace App\Filament\Components\Preparations\ActionPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListActionPreparation
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
