<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Policies\Schemas\PolicyForm;
use App\Filament\Resources\Policies\Tables\PoliciesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PoliciesRelationManager extends RelationManager
{
    protected static string $relationship = 'policies';

    public function form(Schema $schema): Schema
    {
        return PolicyForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return PoliciesTable::configure($table)
        ->headerActions(PoliciesTable::relationManagerHeaderActionGroup())
        ->recordActions(PoliciesTable::relationManagerRecordActionGroup())
        ->toolbarActions(PoliciesTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
