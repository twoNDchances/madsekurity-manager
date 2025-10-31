<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Pages;

use App\Filament\Clusters\Positions\Resources\Targets\TargetResource;
use App\Filament\Components\Preparations\TargetPreparation\ListTargetPreparation;
use Filament\Resources\Pages\ListRecords;

class ListTargets extends ListRecords
{
    use ListTargetPreparation;

    protected static string $resource = TargetResource::class;
}
