<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Filament\Components\Preparations\VariablePreparation\CreateVariablePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateVariable extends CreateRecord
{
    // use CreateVariablePreparation;

    protected static string $resource = VariableResource::class;
}
