<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Filament\Components\Preparations\VariablePreparation\ListVariablePreparation;
use Filament\Resources\Pages\ListRecords;

class ListVariables extends ListRecords
{
    use ListVariablePreparation;

    protected static string $resource = VariableResource::class;
}
