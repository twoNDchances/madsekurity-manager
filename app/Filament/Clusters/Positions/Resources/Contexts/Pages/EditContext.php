<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts\Pages;

use App\Filament\Clusters\Positions\Resources\Contexts\ContextResource;
use App\Filament\Components\Preparations\ContextPreparation\EditContextPreparation;
use Filament\Resources\Pages\EditRecord;

class EditContext extends EditRecord
{
    use EditContextPreparation;

    protected static string $resource = ContextResource::class;
}
