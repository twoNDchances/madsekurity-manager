<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Tables;

use App\Filament\Components\Tables\VariableTable\VariableTable;
use Filament\Tables\Table;

class VariablesTable
{
    use VariableTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::key(),
            self::isSecret(),
            self::valueLength(),
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
