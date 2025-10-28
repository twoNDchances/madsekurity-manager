<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class SettingRelationManager extends RelationManager
{
    protected static string $relationship = 'setting';

    protected static ?string $relatedResource = SettingResource::class;

    public function table(Table $table): Table
    {
        return $table;
    }
}
