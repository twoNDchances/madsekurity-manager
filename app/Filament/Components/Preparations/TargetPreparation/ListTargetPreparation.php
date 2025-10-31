<?php

namespace App\Filament\Components\Preparations\TargetPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListTargetPreparation
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
