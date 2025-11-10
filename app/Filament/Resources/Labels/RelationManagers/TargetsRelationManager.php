<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Positions\Resources\Targets\Tables\TargetsTable;
use App\Filament\Clusters\Positions\Resources\Targets\TargetResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TargetsRelationManager extends RelationManager
{
    protected static string $relationship = 'targets';

    protected static ?string $relatedResource = TargetResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(TargetsTable::relationManagerHeaderActionGroup())
        ->recordActions(TargetsTable::relationManagerRecordActionGroup())
        ->toolbarActions(TargetsTable::relationManagerToolbarActionGroup());
    }
}
