<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class HasVariablesRelationManager extends RelationManager
{
    protected static string $relationship = 'hasVariables';

    protected static ?string $relatedResource = VariableResource::class;

    public function table(Table $table): Table
    {
        return $table;
    }
}
