<?php

namespace App\Filament\Components\Preparations\GroupPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateGroupPreparation
{
    use GeneralPreparation, SaveGroupPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
