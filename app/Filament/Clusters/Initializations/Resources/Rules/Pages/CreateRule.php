<?php

namespace App\Filament\Clusters\Initializations\Resources\Rules\Pages;

use App\Filament\Clusters\Initializations\Resources\Rules\RuleResource;
use App\Filament\Components\Preparations\RulePreparation\CreateRulePreparation;
use Filament\Resources\Pages\CreateRecord;

class CreateRule extends CreateRecord
{
    use CreateRulePreparation;

    protected static string $resource = RuleResource::class;
}
