<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Settings\SettingResource;
use App\Filament\Clusters\Configurations\Resources\Settings\Tables\SettingsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class SettingsRelationManager extends RelationManager
{
    protected static string $relationship = 'settings';

    // protected static ?string $relatedResource = SettingResource::class;

    // public function table(Table $table): Table
    // {
    //     return $table
    //     ->headerActions(SettingsTable::relationManagerHeaderActionGroup())
    //     ->recordActions(SettingsTable::relationManagerRecordActionGroup())
    //     ->toolbarActions(SettingsTable::relationManagerToolbarActionGroup());
    // }
}
