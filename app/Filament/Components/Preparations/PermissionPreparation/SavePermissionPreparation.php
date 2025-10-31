<?php

namespace App\Filament\Components\Preparations\PermissionPreparation;

trait SavePermissionPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
