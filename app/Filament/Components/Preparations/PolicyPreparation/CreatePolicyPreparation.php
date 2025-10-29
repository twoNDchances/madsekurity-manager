<?php

namespace App\Filament\Components\Preparations\PolicyPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreatePolicyPreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
