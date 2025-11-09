<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Initialization\Resources\Actions\Schemas\ActionForm;
use App\Filament\Clusters\Initialization\Resources\Actions\Tables\ActionsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ActionsRelationManager extends RelationManager
{
    protected static string $relationship = 'actions';

    public function form(Schema $schema): Schema
    {
        return ActionForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return ActionsTable::configure($table)
        ->headerActions(ActionsTable::relationManagerHeaderActionGroup())
        ->recordActions(ActionsTable::relationManagerRecordActionGroup())
        ->toolbarActions(ActionsTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
