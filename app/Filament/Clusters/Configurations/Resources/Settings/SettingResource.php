<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings;

use App\Filament\Clusters\Configurations\ConfigurationsCluster;
use App\Filament\Clusters\Configurations\Resources\Settings\Pages\CreateSetting;
use App\Filament\Clusters\Configurations\Resources\Settings\Pages\EditSetting;
use App\Filament\Clusters\Configurations\Resources\Settings\Pages\ListSettings;
use App\Filament\Clusters\Configurations\Resources\Settings\RelationManagers\HasVariablesRelationManager;
use App\Filament\Clusters\Configurations\Resources\Settings\Schemas\SettingForm;
use App\Filament\Clusters\Configurations\Resources\Settings\Tables\SettingsTable;
use App\Models\Setting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog8Tooth;

    protected static ?string $cluster = ConfigurationsCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            HasVariablesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit'   => EditSetting::route('/{record}/edit'),
        ];
    }
}
