<?php

namespace App\Filament\Components\Preparations\DefenderPreparation;

trait SaveDefenderPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
