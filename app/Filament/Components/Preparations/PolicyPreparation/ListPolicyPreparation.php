<?php

namespace App\Filament\Components\Preparations\PolicyPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListPolicyPreparation
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
