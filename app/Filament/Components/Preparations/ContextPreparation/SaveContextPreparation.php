<?php

namespace App\Filament\Components\Preparations\ContextPreparation;

trait SaveContextPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
