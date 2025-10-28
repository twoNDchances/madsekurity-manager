<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Pages;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Components\Preparations\SettingPreparation\EditPreparation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    use EditPreparation;

    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
