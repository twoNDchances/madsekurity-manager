<?php

namespace App\Filament\Components\Preparations\SettingPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateSettingPreparation
{
    use GeneralPreparation, SaveSettingPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
