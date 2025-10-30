<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Wordlists\Schemas\WordlistForm;
use App\Filament\Resources\Wordlists\Tables\WordlistsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class WordlistsRelationManager extends RelationManager
{
    protected static string $relationship = 'wordlists';

    public function form(Schema $schema): Schema
    {
        return WordlistForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return WordlistsTable::configure($table)
        ->headerActions(WordlistsTable::relationManagerHeaderActionGroup())
        ->recordActions(WordlistsTable::relationManagerRecordActionGroup())
        ->toolbarActions(WordlistsTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
