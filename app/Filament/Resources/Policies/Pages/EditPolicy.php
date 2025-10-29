<?php

namespace App\Filament\Resources\Policies\Pages;

use App\Filament\Components\Preparations\PolicyPreparation\EditPolicyPreparation;
use App\Filament\Resources\Policies\PolicyResource;
use Filament\Resources\Pages\EditRecord;

class EditPolicy extends EditRecord
{
    use EditPolicyPreparation;

    protected static string $resource = PolicyResource::class;
}
