<?php

namespace App\Filament\Components\Preparations\PolicyPreparation;

trait SavePolicyPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
