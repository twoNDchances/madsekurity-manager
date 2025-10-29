<?php

namespace App\Filament\Components\Preparations\UserPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListUserPreparation
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
