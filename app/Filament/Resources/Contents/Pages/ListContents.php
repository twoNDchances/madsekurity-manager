<?php

namespace App\Filament\Resources\Contents\Pages;

use App\Filament\Components\Preparations\ContentPreparation\ListContentPreparation;
use App\Filament\Resources\Contents\ContentResource;
use Filament\Resources\Pages\ListRecords;

class ListContents extends ListRecords
{
    use ListContentPreparation;

    protected static string $resource = ContentResource::class;
}
