<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Pages;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Components\Preparations\SettingPreparation\CreateSettingPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    use CreateSettingPreparation;

    protected static string $resource = SettingResource::class;
}
