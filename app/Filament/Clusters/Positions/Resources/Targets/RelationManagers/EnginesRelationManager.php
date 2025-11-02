<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\RelationManagers;

use App\Filament\Clusters\Positions\Resources\Engines\Schemas\EngineForm;
use App\Filament\Clusters\Positions\Resources\Engines\Tables\EnginesTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class EnginesRelationManager extends RelationManager
{
    protected static string $relationship = 'engines';

    public function form(Schema $schema): Schema
    {
        return EngineForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return EnginesTable::configure($table)
        ->recordTitleAttribute('name');
    }
}
