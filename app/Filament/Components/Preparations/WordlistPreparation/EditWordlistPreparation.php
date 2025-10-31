<?php

namespace App\Filament\Components\Preparations\WordlistPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditWordlistPreparation
{
    use GeneralPreparation, SaveWordlistPreparation;

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
