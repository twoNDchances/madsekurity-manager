<?php

namespace App\Filament\Components\Preparations\BehaviorPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateBehaviorPreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
