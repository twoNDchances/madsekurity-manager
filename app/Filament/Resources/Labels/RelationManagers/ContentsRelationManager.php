<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Contents\Schemas\ContentForm;
use App\Filament\Resources\Contents\Tables\ContentsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ContentsRelationManager extends RelationManager
{
    protected static string $relationship = 'contents';

    public function form(Schema $schema): Schema
    {
        return ContentForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return ContentsTable::configure($table)
        ->headerActions(ContentsTable::relationManagerHeaderActionGroup())
        ->recordActions(ContentsTable::relationManagerRecordActionGroup())
        ->toolbarActions(ContentsTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
