<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups\Pages;

use App\Filament\Clusters\Initializations\Resources\Groups\GroupResource;
use App\Filament\Components\Preparations\GroupPreparation\EditGroupPreparation;
use Filament\Resources\Pages\EditRecord;

class EditGroup extends EditRecord
{
    use EditGroupPreparation;

    protected static string $resource = GroupResource::class;
}
