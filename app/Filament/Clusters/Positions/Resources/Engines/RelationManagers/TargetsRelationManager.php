<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\RelationManagers;

use App\Filament\Clusters\Positions\Resources\Targets\Schemas\TargetForm;
use App\Filament\Clusters\Positions\Resources\Targets\Tables\TargetsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class TargetsRelationManager extends RelationManager
{
    protected static string $relationship = 'targets';

    public function form(Schema $schema): Schema
    {
        return TargetForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return TargetsTable::configure($table)
        ->recordTitleAttribute('name');
    }
}
