<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateEnginePreparation
{
    use GeneralPreparation, SaveEnginePreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
