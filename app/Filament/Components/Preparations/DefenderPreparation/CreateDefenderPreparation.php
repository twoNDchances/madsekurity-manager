<?php

namespace App\Filament\Components\Preparations\DefenderPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateDefenderPreparation
{
    use GeneralPreparation, SaveDefenderPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
