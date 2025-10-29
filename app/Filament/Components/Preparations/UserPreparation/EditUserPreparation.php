<?php

namespace App\Filament\Components\Preparations\UserPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditUserPreparation
{
    use GeneralPreparation;

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
        if (!isset($data['password']))
        {
            unset($data['password']);
        }
        return $data;
    }
}
