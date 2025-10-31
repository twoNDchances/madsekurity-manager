<?php

namespace App\Filament\Components\Preparations\TargetPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditTargetPreparation
{
    use GeneralPreparation, SaveTargetPreparation;

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
