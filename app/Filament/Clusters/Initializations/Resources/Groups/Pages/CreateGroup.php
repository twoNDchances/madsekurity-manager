<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups\Pages;

use App\Filament\Clusters\Initializations\Resources\Groups\GroupResource;
use App\Filament\Components\Preparations\GroupPreparation\CreateGroupPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateGroup extends CreateRecord
{
    use CreateGroupPreparation;

    protected static string $resource = GroupResource::class;
}
