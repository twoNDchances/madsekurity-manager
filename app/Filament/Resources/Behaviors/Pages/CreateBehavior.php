<?php

namespace App\Filament\Resources\Behaviors\Pages;

use App\Filament\Components\Preparations\BehaviorPreparation\CreateBehaviorPreparation;
use App\Filament\Resources\Behaviors\BehaviorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBehavior extends CreateRecord
{
    // use CreateBehaviorPreparation;

    protected static string $resource = BehaviorResource::class;
}
