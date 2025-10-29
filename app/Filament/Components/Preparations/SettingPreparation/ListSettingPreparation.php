<?php

namespace App\Filament\Components\Preparations\SettingPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListSettingPreparation
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
