<?php

namespace App\Filament\Resources\Policies\Pages;

use App\Filament\Components\Preparations\PolicyPreparation\ListPolicyPreparation;
use App\Filament\Resources\Policies\PolicyResource;
use Filament\Resources\Pages\ListRecords;

class ListPolicies extends ListRecords
{
    use ListPolicyPreparation;

    protected static string $resource = PolicyResource::class;
}
