<?php

namespace App\Filament\Components\Preparations\LabelPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListLabelPreparation
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
