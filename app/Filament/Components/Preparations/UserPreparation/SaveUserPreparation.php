<?php

namespace App\Filament\Components\Preparations\UserPreparation;

trait SaveUserPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
