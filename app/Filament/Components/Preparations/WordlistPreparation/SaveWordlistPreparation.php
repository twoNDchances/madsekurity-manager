<?php

namespace App\Filament\Components\Preparations\WordlistPreparation;

trait SaveWordlistPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
