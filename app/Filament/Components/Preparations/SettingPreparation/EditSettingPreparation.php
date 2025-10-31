<?php

namespace App\Filament\Components\Preparations\SettingPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditSettingPreparation
{
    use GeneralPreparation, SaveSettingPreparation;

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
