<?php

namespace App\Filament\Resources\Wordlists\Tables;

use App\Filament\Components\Tables\WordlistTable\WordlistTable;
use Filament\Tables\Table;

class WordlistsTable
{
    use WordlistTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::wordsType(),
            self::wordsCount(),
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
