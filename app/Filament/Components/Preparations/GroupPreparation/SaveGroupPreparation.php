<?php

namespace App\Filament\Components\Preparations\GroupPreparation;

trait SaveGroupPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
