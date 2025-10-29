<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Variables\Schemas\VariableForm;
use App\Filament\Clusters\Configurations\Resources\Variables\Tables\VariablesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class VariablesRelationManager extends RelationManager
{
    protected static string $relationship = 'variables';

    public function form(Schema $schema): Schema
    {
        return VariableForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return VariablesTable::configure($table)
        ->headerActions(VariablesTable::relationManagerHeaderActionGroup())
        ->recordActions(VariablesTable::relationManagerRecordActionGroup())
        ->toolbarActions(VariablesTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('key');
    }
}
