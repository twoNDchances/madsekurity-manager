<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Positions\Resources\Engines\EngineResource;
use App\Filament\Clusters\Positions\Resources\Engines\Tables\EnginesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class EnginesRelationManager extends RelationManager
{
    protected static string $relationship = 'engines';

    protected static ?string $relatedResource = EngineResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(EnginesTable::relationManagerHeaderActionGroup())
        ->recordActions(EnginesTable::relationManagerRecordActionGroup())
        ->toolbarActions(EnginesTable::relationManagerToolbarActionGroup());
    }
}
