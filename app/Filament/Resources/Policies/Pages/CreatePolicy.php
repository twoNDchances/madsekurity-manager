<?php

namespace App\Filament\Resources\Policies\Pages;

use App\Filament\Components\Preparations\PolicyPreparation\CreatePreparation;
use App\Filament\Resources\Policies\PolicyResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePolicy extends CreateRecord
{
    use CreatePreparation;

    protected static string $resource = PolicyResource::class;
}
