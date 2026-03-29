<?php

namespace App\Filament\Components\Preparations\DefenderPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListDefenderPreparation
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
