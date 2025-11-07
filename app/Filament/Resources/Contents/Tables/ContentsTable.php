<?php

namespace App\Filament\Resources\Contents\Tables;

use App\Filament\Components\Tables\ContentTable\ContentTable;
use Filament\Tables\Table;

class ContentsTable
{
    use ContentTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::type(),
            self::length(),
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
