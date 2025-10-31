<?php

namespace App\Filament\Resources\Behaviors\Pages;

use App\Filament\Components\Preparations\BehaviorPreparation\EditBehaviorPreparation;
use App\Filament\Resources\Behaviors\BehaviorResource;
use Filament\Resources\Pages\EditRecord;

class EditBehavior extends EditRecord
{
    // use EditBehaviorPreparation;

    protected static string $resource = BehaviorResource::class;
}
