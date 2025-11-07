<?php

namespace App\Filament\Components\Preparations\ActionPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateActionPreparation
{
    use GeneralPreparation, SaveActionPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
