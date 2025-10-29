<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Pages;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Components\Preparations\SettingPreparation\ListSettingPreparation;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    use ListSettingPreparation;

    protected static string $resource = SettingResource::class;
}
