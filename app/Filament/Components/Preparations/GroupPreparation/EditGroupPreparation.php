<?php

namespace App\Filament\Components\Preparations\GroupPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditGroupPreparation
{
    use GeneralPreparation, SaveGroupPreparation;

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
