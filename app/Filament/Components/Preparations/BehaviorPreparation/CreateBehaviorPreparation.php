<?php

namespace App\Filament\Components\Preparations\BehaviorPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateBehaviorPreparation
{
    use GeneralPreparation, SaveBehaviorPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
