<?php

namespace App\Filament\Clusters\Initialization\Resources\Rules\Pages;

use App\Filament\Clusters\Initialization\Resources\Rules\RuleResource;
use App\Filament\Components\Preparations\RulePreparation\CreateRulePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateRule extends CreateRecord
{
    use CreateRulePreparation;

    protected static string $resource = RuleResource::class;
}
