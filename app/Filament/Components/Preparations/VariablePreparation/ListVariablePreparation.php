<?php

namespace App\Filament\Components\Preparations\VariablePreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListVariablePreparation
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
