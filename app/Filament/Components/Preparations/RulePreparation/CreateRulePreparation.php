<?php

namespace App\Filament\Components\Preparations\RulePreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait CreateRulePreparation
{
    use GeneralPreparation, SaveRulePreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
