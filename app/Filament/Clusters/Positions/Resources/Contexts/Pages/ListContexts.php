<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts\Pages;

use App\Filament\Clusters\Positions\Resources\Contexts\ContextResource;
use App\Filament\Components\Preparations\ContextPreparation\ListContextPreparation;
use Filament\Resources\Pages\ListRecords;

class ListContexts extends ListRecords
{
    use ListContextPreparation;

    protected static string $resource = ContextResource::class;
}
