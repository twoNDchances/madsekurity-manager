<?php

namespace App\Filament\Components\Preparations\RulePreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListRulePreparation
{
    use GeneralAction;

    protected function getHeaderActions(): array
    {
        return [
            self::createAction(),
        ];
    }

    public function getTabs(): array
    {
        return [];
    }
}
