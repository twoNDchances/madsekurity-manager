<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\Pages;

use App\Filament\Clusters\Positions\Resources\Engines\EngineResource;
use App\Filament\Components\Preparations\EnginePreparation\ListEnginePreparation;
use Filament\Resources\Pages\ListRecords;

class ListEngines extends ListRecords
{
    use ListEnginePreparation;

    protected static string $resource = EngineResource::class;
}
