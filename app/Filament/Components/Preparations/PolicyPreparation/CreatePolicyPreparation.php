<?php

namespace App\Filament\Components\Preparations\PolicyPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreatePolicyPreparation
{
    use GeneralPreparation, SavePolicyPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
