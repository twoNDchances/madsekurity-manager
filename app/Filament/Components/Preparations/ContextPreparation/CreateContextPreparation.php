<?php

namespace App\Filament\Components\Preparations\ContextPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateContextPreparation
{
    use GeneralPreparation, SaveContextPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
