<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditEnginePreparation
{
    use GeneralPreparation, SaveEnginePreparation;

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
