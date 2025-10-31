<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Tables;

use App\Filament\Components\Tables\TargetTable\TargetTable;
use Filament\Tables\Table;

class TargetsTable
{
    use TargetTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
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
