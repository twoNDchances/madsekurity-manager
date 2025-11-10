<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Wordlists\Tables\WordlistsTable;
use App\Filament\Resources\Wordlists\WordlistResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class WordlistsRelationManager extends RelationManager
{
    protected static string $relationship = 'wordlists';

    protected static ?string $relatedResource = WordlistResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(WordlistsTable::relationManagerHeaderActionGroup())
        ->recordActions(WordlistsTable::relationManagerRecordActionGroup())
        ->toolbarActions(WordlistsTable::relationManagerToolbarActionGroup());
    }
}
