<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Permissions\PermissionResource;
use App\Filament\Resources\Permissions\Tables\PermissionsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $relatedResource = PermissionResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(PermissionsTable::relationManagerHeaderActionGroup())
        ->recordActions(PermissionsTable::relationManagerRecordActionGroup())
        ->toolbarActions(PermissionsTable::relationManagerToolbarActionGroup());
    }
}
