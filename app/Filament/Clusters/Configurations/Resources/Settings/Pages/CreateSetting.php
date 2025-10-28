<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Pages;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Components\Preparations\SettingPreparation\CreatePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    use CreatePreparation;

    protected static string $resource = SettingResource::class;
}
