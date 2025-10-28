<?php

namespace App\Filament\Resources\Permissions\Tables;

use App\Filament\Components\Tables\PermissionTable\PermissionTable;
use Filament\Tables\Table;

class PermissionsTable
{
    use PermissionTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::type('resource'),
            self::type('action'),
            self::owner(),
            self::createdAt(),
            self::updatedAt(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(),
        ])
        ->toolbarActions([
            self::bulkActionGroup(),
        ]);
    }
}
