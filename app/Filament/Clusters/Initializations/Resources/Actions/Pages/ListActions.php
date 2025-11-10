<?php

namespace App\Filament\Clusters\Initializations\Resources\Actions\Pages;

use App\Filament\Clusters\Initializations\Resources\Actions\ActionResource;
use App\Filament\Components\Preparations\ActionPreparation\ListActionPreparation;
use Filament\Resources\Pages\ListRecords;

class ListActions extends ListRecords
{
    use ListActionPreparation;

    protected static string $resource = ActionResource::class;
}
