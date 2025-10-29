<?php

namespace App\Filament\Components\Preparations\LabelPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateLabelPreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
