<?php

namespace App\Filament\Components\Preparations\PermissionPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreatePreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
