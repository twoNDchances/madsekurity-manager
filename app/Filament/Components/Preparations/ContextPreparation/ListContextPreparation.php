<?php

namespace App\Filament\Components\Preparations\ContextPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListContextPreparation
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
