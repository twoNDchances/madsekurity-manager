<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\Pages;

use App\Filament\Clusters\Positions\Resources\Engines\EngineResource;
use App\Filament\Components\Preparations\EnginePreparation\CreateEnginePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateEngine extends CreateRecord
{
    use CreateEnginePreparation;

    protected static string $resource = EngineResource::class;
}
