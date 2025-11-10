<?php

namespace App\Filament\Clusters\Initializations\Resources\Rules\RelationManagers;

use App\Filament\Clusters\Initializations\Resources\Actions\ActionResource;
use App\Filament\Clusters\Initializations\Resources\Actions\Tables\ActionsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ActionsRelationManager extends RelationManager
{
    protected static string $relationship = 'actions';

    protected static ?string $relatedResource = ActionResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(ActionsTable::relationManagerHeaderActionGroup())
        ->recordActions(ActionsTable::relationManagerRecordActionGroup())
        ->toolbarActions(ActionsTable::relationManagerToolbarActionGroup())
        ->reorderable('order');
    }
}
