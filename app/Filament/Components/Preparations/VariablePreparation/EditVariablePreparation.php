<?php

namespace App\Filament\Components\Preparations\VariablePreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditVariablePreparation
{
    use GeneralPreparation, SaveVariablePreparation;

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
