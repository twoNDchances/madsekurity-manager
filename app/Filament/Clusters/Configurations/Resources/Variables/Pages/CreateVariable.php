<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Filament\Components\Preparations\VariablePreparation\CreatePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateVariable extends CreateRecord
{
    use CreatePreparation;

    protected static string $resource = VariableResource::class;
}
