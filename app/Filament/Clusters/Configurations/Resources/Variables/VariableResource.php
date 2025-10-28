<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables;

use App\Filament\Clusters\Configurations\ConfigurationsCluster;
use App\Filament\Clusters\Configurations\Resources\Variables\Pages\CreateVariable;
use App\Filament\Clusters\Configurations\Resources\Variables\Pages\EditVariable;
use App\Filament\Clusters\Configurations\Resources\Variables\Pages\ListVariables;
use App\Filament\Clusters\Configurations\Resources\Variables\RelationManagers\SettingRelationManager;
use App\Filament\Clusters\Configurations\Resources\Variables\Schemas\VariableForm;
use App\Filament\Clusters\Configurations\Resources\Variables\Tables\VariablesTable;
use App\Models\Variable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VariableResource extends Resource
{
    protected static ?string $model = Variable::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentCurrencyDollar;

    protected static ?string $cluster = ConfigurationsCluster::class;

    protected static ?string $recordTitleAttribute = 'key';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return VariableForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VariablesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            SettingRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVariables::route('/'),
            'create' => CreateVariable::route('/create'),
            'edit' => EditVariable::route('/{record}/edit'),
        ];
    }
}
