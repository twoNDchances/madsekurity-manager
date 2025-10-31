<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\Tables;

use App\Filament\Components\Tables\EngineTable\EngineTable;
use Filament\Tables\Table;

class EnginesTable
{
    use EngineTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::inputDatatype(),
            self::type(),
            self::outputDatatype(),
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
