<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups\Tables;

use App\Filament\Components\Tables\GroupTable\GroupTable;
use Filament\Tables\Table;

class GroupsTable
{
    use GroupTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::level(),
            self::rules(),
            self::labels(),
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
