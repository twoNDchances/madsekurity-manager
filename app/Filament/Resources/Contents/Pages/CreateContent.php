<?php

namespace App\Filament\Resources\Contents\Pages;

use App\Filament\Components\Preparations\ContentPreparation\CreateContentPreparation;
use App\Filament\Resources\Contents\ContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContent extends CreateRecord
{
    use CreateContentPreparation;

    protected static string $resource = ContentResource::class;
}
