<?php

namespace App\Filament\Components\Preparations\BehaviorPreparation;

trait SaveBehaviorPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
