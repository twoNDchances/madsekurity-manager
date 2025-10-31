<?php

namespace App\Filament\Components\Preparations\LabelPreparation;

trait SaveLabelPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        return $data;
    }
}
