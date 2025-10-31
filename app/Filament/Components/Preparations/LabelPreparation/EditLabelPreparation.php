<?php

namespace App\Filament\Components\Preparations\LabelPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditLabelPreparation
{
    use GeneralPreparation, SaveLabelPreparation;

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
