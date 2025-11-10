<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Resources\Contents\ContentResource;
use App\Filament\Resources\Contents\Tables\ContentsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ContentsRelationManager extends RelationManager
{
    protected static string $relationship = 'contents';

    protected static ?string $relatedResource = ContentResource::class;

    public function table(Table $table): Table
    {
        return $table
        ->headerActions(ContentsTable::relationManagerHeaderActionGroup())
        ->recordActions(ContentsTable::relationManagerRecordActionGroup())
        ->toolbarActions(ContentsTable::relationManagerToolbarActionGroup());
    }
}
