<?php

namespace App\Filament\Resources\Contents\Pages;

use App\Filament\Components\Preparations\ContentPreparation\EditContentPreparation;
use App\Filament\Resources\Contents\ContentResource;
use Filament\Resources\Pages\EditRecord;

class EditContent extends EditRecord
{
    use EditContentPreparation;

    protected static string $resource = ContentResource::class;
}
