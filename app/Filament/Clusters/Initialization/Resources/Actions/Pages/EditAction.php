<?php

namespace App\Filament\Clusters\Initialization\Resources\Actions\Pages;

use App\Filament\Clusters\Initialization\Resources\Actions\ActionResource;
use App\Filament\Components\Preparations\ActionPreparation\EditActionPreparation;
use Filament\Resources\Pages\EditRecord;

class EditAction extends EditRecord
{
    use EditActionPreparation;

    protected static string $resource = ActionResource::class;
}
