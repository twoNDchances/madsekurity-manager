<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\Pages;

use App\Filament\Clusters\Implementations\Resources\Defenders\DefenderResource;
use App\Filament\Components\Preparations\DefenderPreparation\CreateDefenderPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateDefender extends CreateRecord
{
    use CreateDefenderPreparation;

    protected static string $resource = DefenderResource::class;
}
