<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts\Tables;

use App\Filament\Components\Tables\ContextTable\ContextTable;
use Filament\Tables\Table;

class ContextsTable
{
    use ContextTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::phase(),
            self::type(),
            self::datatype(),
            self::hasTargets(),
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
