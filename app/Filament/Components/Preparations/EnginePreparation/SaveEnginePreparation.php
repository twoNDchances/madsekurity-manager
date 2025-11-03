<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

use App\Schemas\EngineSchema;

trait SaveEnginePreparation
{
    // Complex preparation
    public static function mutateFormDataBefore(array $data): array
    {
        if ($data['type'] == 'indexOf' && isset($data['index_of']))
        {
            $data['configuration'] = ['index_of' => $data['index_of']];
            unset($data['index_of']);
        }

        if (in_array($data['type'], array_keys(EngineSchema::$typesOfDatatypes['number'])) && isset($data['number']))
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
