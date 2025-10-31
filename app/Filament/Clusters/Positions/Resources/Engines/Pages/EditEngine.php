<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\Pages;

use App\Filament\Clusters\Positions\Resources\Engines\EngineResource;
use App\Filament\Components\Preparations\EnginePreparation\EditEnginePreparation;
use Filament\Resources\Pages\EditRecord;

class EditEngine extends EditRecord
{
    use EditEnginePreparation;

    protected static string $resource = EngineResource::class;
}
