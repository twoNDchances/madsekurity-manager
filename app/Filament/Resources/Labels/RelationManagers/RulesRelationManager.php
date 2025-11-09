<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Initialization\Resources\Rules\Schemas\RuleForm;
use App\Filament\Clusters\Initialization\Resources\Rules\Tables\RulesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class RulesRelationManager extends RelationManager
{
    protected static string $relationship = 'rules';

    public function form(Schema $schema): Schema
    {
        return RuleForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return RulesTable::configure($table)
        ->headerActions(RulesTable::relationManagerHeaderActionGroup())
        ->recordActions(RulesTable::relationManagerRecordActionGroup())
        ->toolbarActions(RulesTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
