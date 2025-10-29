<?php

namespace App\Filament\Resources\Labels\Pages;

use App\Filament\Components\Preparations\LabelPreparation\CreateLabelPreparation;
use App\Filament\Resources\Labels\LabelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLabel extends CreateRecord
{
    use CreateLabelPreparation;

    protected static string $resource = LabelResource::class;
}
