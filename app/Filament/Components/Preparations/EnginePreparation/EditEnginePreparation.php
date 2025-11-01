<?php

namespace App\Filament\Components\Preparations\EnginePreparation;

use App\Filament\Components\Generals\GeneralPreparation;
use App\Schemas\EngineSchema;

trait EditEnginePreparation
{
    use GeneralPreparation, SaveEnginePreparation;

    protected function getHeaderActions(): array
    {
        return [
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data['type'] == 'indexOf')
        {
            $data['index_of'] = $data['configuration']['index_of'];
        }

        if (in_array($data['type'], array_keys(EngineSchema::$typesOfDatatypes['number'])))
        {
            $data['number'] = $data['configuration']['number'];
        }

        if ($data['type'] == 'hash')
        {
            $data['hash'] = $data['configuration']['hash'];
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
