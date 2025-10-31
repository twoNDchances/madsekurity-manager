<?php

namespace App\Filament\Components\Preparations\PolicyPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditPolicyPreparation
{
    use GeneralPreparation, SavePolicyPreparation;

    protected function getHeaderActions(): array
    {
        return [
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
