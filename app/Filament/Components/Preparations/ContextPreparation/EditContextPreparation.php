<?php

namespace App\Filament\Components\Preparations\ContextPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditContextPreparation
{
    use GeneralPreparation, SaveContextPreparation;

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
