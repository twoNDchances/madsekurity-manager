<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\RelationManagers;

use App\Filament\Clusters\Configurations\Resources\Settings\Schemas\SettingForm;
use App\Filament\Clusters\Configurations\Resources\Settings\Tables\SettingsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class SettingRelationManager extends RelationManager
{
    protected static string $relationship = 'setting';

    public function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return SettingsTable::configure($table)
        ->recordActions(SettingsTable::actionGroup())
        ->toolbarActions(SettingsTable::bulkActionGroup())
        ->recordTitleAttribute('name');
    }
}
