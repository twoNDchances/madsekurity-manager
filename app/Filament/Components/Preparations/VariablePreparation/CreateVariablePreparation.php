<?php

namespace App\Filament\Components\Preparations\VariablePreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateVariablePreparation
{
    use GeneralPreparation, SaveVariablePreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
