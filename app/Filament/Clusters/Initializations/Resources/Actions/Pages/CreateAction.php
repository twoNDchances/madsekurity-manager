<?php

namespace App\Filament\Clusters\Initializations\Resources\Actions\Pages;

use App\Filament\Clusters\Initializations\Resources\Actions\ActionResource;
use App\Filament\Components\Preparations\ActionPreparation\CreateActionPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateAction extends CreateRecord
{
    use CreateActionPreparation;

    protected static string $resource = ActionResource::class;
}
