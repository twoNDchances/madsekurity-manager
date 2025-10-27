<?php

namespace App\Filament\Components\Preparations\PermissionPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditPreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
}
