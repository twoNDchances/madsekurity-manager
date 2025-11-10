<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Initializations\Resources\Rules\RuleResource;
use App\Filament\Clusters\Initializations\Resources\Rules\Tables\RulesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class RulesRelationManager extends RelationManager
{
    protected static string $relationship = 'rules';

    protected static ?string $relatedResource = RuleResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(RulesTable::relationManagerHeaderActionGroup())
        ->recordActions(RulesTable::relationManagerRecordActionGroup())
        ->toolbarActions(RulesTable::relationManagerToolbarActionGroup());
    }
}
