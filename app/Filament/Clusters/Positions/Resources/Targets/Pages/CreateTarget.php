<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Pages;

use App\Filament\Clusters\Positions\Resources\Targets\TargetResource;
use App\Filament\Components\Preparations\TargetPreparation\CreateTargetPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateTarget extends CreateRecord
{
    use CreateTargetPreparation;

    protected static string $resource = TargetResource::class;
}
