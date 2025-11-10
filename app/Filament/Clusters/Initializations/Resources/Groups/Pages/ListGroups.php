<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups\Pages;

use App\Filament\Clusters\Initializations\Resources\Groups\GroupResource;
use App\Filament\Components\Preparations\GroupPreparation\ListGroupPreparation;
use Filament\Resources\Pages\ListRecords;

class ListGroups extends ListRecords
{
    use ListGroupPreparation;

    protected static string $resource = GroupResource::class;
}
