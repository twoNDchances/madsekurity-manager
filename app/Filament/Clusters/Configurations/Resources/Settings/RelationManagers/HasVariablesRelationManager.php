<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Variables\Schemas\VariableForm;
use App\Filament\Clusters\Configurations\Resources\Variables\Tables\VariablesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HasVariablesRelationManager extends RelationManager
{
    protected static string $relationship = 'hasVariables';

    public function form(Schema $schema): Schema
    {
        return VariableForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return VariablesTable::configure($table)
        ->headerActions(VariablesTable::relationManagerHeaderActionGroup(attach: false))
        ->recordActions(VariablesTable::actionGroup())
        ->toolbarActions(VariablesTable::bulkActionGroup())
        ->recordTitleAttribute('key');
    }
}
