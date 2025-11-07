<?php

namespace App\Filament\Components\Preparations\ContentPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListContentPreparation
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
