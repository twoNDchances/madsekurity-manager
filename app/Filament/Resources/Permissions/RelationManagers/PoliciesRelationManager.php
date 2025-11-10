<?php

namespace App\Filament\Resources\Permissions\RelationManagers;

use App\Filament\Resources\Policies\PolicyResource;
use App\Filament\Resources\Policies\Tables\PoliciesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PoliciesRelationManager extends RelationManager
{
    protected static string $relationship = 'policies';

    protected static ?string $relatedResource = PolicyResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(PoliciesTable::relationManagerHeaderActionGroup())
        ->recordActions(PoliciesTable::relationManagerRecordActionGroup())
        ->toolbarActions(PoliciesTable::relationManagerToolbarActionGroup());
    }
}
