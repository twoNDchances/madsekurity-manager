<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Pages;

use App\Filament\Clusters\Positions\Resources\Targets\TargetResource;
use App\Filament\Components\Preparations\TargetPreparation\EditTargetPreparation;
use Filament\Resources\Pages\EditRecord;

class EditTarget extends EditRecord
{
    use EditTargetPreparation;

    protected static string $resource = TargetResource::class;
}
