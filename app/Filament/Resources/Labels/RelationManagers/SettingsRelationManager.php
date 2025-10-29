<?php

namespace App\Filament\Resources\Labels\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Settings\Schemas\SettingForm;
use App\Filament\Clusters\Configurations\Resources\Settings\Tables\SettingsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class SettingsRelationManager extends RelationManager
{
    protected static string $relationship = 'settings';

    public function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return SettingsTable::configure($table)
        ->headerActions(SettingsTable::relationManagerHeaderActionGroup())
        ->recordActions(SettingsTable::relationManagerRecordActionGroup())
        ->toolbarActions(SettingsTable::relationManagerToolbarActionGroup())
        ->recordTitleAttribute('name');
    }
}
