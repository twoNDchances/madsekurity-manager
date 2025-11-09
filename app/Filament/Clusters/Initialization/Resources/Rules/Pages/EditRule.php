<?php

namespace App\Filament\Clusters\Initialization\Resources\Rules\Pages;

use App\Filament\Clusters\Initialization\Resources\Rules\RuleResource;
use App\Filament\Components\Preparations\RulePreparation\EditRulePreparation;
use Filament\Resources\Pages\EditRecord;

class EditRule extends EditRecord
{
    use EditRulePreparation;

    protected static string $resource = RuleResource::class;
}
