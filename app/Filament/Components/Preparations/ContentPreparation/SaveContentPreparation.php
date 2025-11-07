<?php

namespace App\Filament\Components\Preparations\ContentPreparation;

trait SaveContentPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
