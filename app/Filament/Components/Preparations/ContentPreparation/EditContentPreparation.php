<?php

namespace App\Filament\Components\Preparations\ContentPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditContentPreparation
{
    use GeneralPreparation, SaveContentPreparation;

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
