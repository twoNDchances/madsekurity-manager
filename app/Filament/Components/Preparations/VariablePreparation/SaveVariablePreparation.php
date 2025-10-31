<?php

namespace App\Filament\Components\Preparations\VariablePreparation;

trait SaveVariablePreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
