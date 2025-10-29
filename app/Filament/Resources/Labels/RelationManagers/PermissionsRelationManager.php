<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Permissions\Schemas\PermissionForm;
use App\Filament\Resources\Permissions\Tables\PermissionsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    public function form(Schema $schema): Schema
    {
        return PermissionForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return PermissionsTable::configure($table)
        ->headerActions(PermissionsTable::relationManagerHeaderActionGroup())
        ->recordActions(PermissionsTable::relationManagerRecordActionGroup())
        ->toolbarActions(PermissionsTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
