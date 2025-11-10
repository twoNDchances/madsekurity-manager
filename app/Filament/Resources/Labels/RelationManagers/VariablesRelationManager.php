<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Variables\Tables\VariablesTable;
use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class VariablesRelationManager extends RelationManager
{
    protected static string $relationship = 'variables';

    // protected static ?string $relatedResource = VariableResource::class;

    // public function table(Table $table): Table
    // {
    //     return $table
    //     ->headerActions(VariablesTable::relationManagerHeaderActionGroup())
    //     ->recordActions(VariablesTable::relationManagerRecordActionGroup())
    //     ->toolbarActions(VariablesTable::relationManagerToolbarActionGroup());
    // }
}
