<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\Pages;

use App\Filament\Clusters\Implementations\Resources\Defenders\DefenderResource;
use App\Filament\Components\Preparations\DefenderPreparation\ListDefenderPreparation;
use Filament\Resources\Pages\ListRecords;

class ListDefenders extends ListRecords
{
    use ListDefenderPreparation;

    protected static string $resource = DefenderResource::class;
}
