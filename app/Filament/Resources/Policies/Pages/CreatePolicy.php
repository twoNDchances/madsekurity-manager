<?php

namespace App\Filament\Resources\Policies\Pages;

use App\Filament\Components\Preparations\PolicyPreparation\CreatePolicyPreparation;
use App\Filament\Resources\Policies\PolicyResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePolicy extends CreateRecord
{
    use CreatePolicyPreparation;

    protected static string $resource = PolicyResource::class;
}
