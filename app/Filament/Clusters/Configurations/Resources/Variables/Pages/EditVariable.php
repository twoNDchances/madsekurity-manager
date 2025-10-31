<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Filament\Components\Preparations\VariablePreparation\EditVariablePreparation;
use Filament\Resources\Pages\EditRecord;

class EditVariable extends EditRecord
{
    // use EditVariablePreparation;

    protected static string $resource = VariableResource::class;
}
