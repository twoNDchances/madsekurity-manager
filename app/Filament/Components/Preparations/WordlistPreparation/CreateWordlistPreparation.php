<?php

namespace App\Filament\Components\Preparations\WordlistPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateWordlistPreparation
{
    use GeneralPreparation, SaveWordlistPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
