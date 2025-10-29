<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Pages;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Components\Preparations\SettingPreparation\EditSettingPreparation;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    use EditSettingPreparation;

    protected static string $resource = SettingResource::class;
}
