<?php

namespace App\Filament\Components\Preparations\BehaviorPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditBehaviorPreparation
{
    use GeneralPreparation, SaveBehaviorPreparation;

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
