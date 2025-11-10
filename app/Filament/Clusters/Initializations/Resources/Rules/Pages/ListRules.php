<?php

namespace App\Filament\Clusters\Initializations\Resources\Rules\Pages;

use App\Filament\Clusters\Initializations\Resources\Rules\RuleResource;
use App\Filament\Components\Preparations\RulePreparation\ListRulePreparation;
use Filament\Resources\Pages\ListRecords;

class ListRules extends ListRecords
{
    use ListRulePreparation;

    protected static string $resource = RuleResource::class;
}
