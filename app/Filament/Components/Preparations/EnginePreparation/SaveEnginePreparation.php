<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

trait SaveEnginePreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        if (isset($data['indexOf']))
        {
            $data['configuration'] = ['index_of' => $data['index_of']];
            unset($data['index_of']);
        }

        if (isset($data['number']))
        {
            $data['configuration'] = ['number' => $data['number']];
            unset($data['number']);
        }

        if (isset($data['hash']))
        {
            $data['configuration'] = ['hash' => $data['hash']];
            unset($data['hash']);
        }
        return $data;
    }
}
