<?php

namespace App\Filament\Components\Preparations\GroupPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListGroupPreparation
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
