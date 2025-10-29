<?php

namespace App\Filament\Components\Preparations\PermissionPreparation;

use App\Filament\Components\Generals\GeneralAction;

trait ListPermissionPreparation
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
