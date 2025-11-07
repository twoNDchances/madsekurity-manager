<?php

namespace App\Filament\Components\Preparations\ContentPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateContentPreparation
{
    use GeneralPreparation, SaveContentPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
