<?php

namespace App\Filament\Resources\Labels\Pages;

use App\Filament\Components\Preparations\LabelPreparation\ListLabelPreparation;
use App\Filament\Resources\Labels\LabelResource;
use Filament\Resources\Pages\ListRecords;

class ListLabels extends ListRecords
{
    use ListLabelPreparation;

    protected static string $resource = LabelResource::class;
}
