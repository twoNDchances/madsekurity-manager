<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts\Pages;

use App\Filament\Clusters\Positions\Resources\Contexts\ContextResource;
use App\Filament\Components\Preparations\ContextPreparation\CreateContextPreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateContext extends CreateRecord
{
    use CreateContextPreparation;

    protected static string $resource = ContextResource::class;
}
