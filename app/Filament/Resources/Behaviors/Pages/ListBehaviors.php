<?php

namespace App\Filament\Resources\Behaviors\Pages;

use App\Filament\Components\Preparations\BehaviorPreparation\ListBehaviorPreparation;
use App\Filament\Resources\Behaviors\BehaviorResource;
use Filament\Resources\Pages\ListRecords;

class ListBehaviors extends ListRecords
{
    use ListBehaviorPreparation;

    protected static string $resource = BehaviorResource::class;
}
