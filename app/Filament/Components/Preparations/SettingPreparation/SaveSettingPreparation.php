<?php

namespace App\Filament\Components\Preparations\SettingPreparation;

trait SaveSettingPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
