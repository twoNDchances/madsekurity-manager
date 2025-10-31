<?php

namespace App\Filament\Components\Preparations\TargetPreparation;

trait SaveTargetPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
