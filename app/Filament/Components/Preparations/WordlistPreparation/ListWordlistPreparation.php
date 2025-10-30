<?php

namespace App\Filament\Components\Preparations\WordlistPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListWordlistPreparation
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
