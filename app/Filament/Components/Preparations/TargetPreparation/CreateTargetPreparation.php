<?php

namespace App\Filament\Components\Preparations\TargetPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateTargetPreparation
{
    use GeneralPreparation, SaveTargetPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
