<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders;

use App\Filament\Clusters\Implementations\ImplementationsCluster;
use App\Filament\Clusters\Implementations\Resources\Defenders\Pages\CreateDefender;
use App\Filament\Clusters\Implementations\Resources\Defenders\Pages\EditDefender;
use App\Filament\Clusters\Implementations\Resources\Defenders\Pages\ListDefenders;
use App\Filament\Clusters\Implementations\Resources\Defenders\RelationManagers\GroupsRelationManager;
use App\Filament\Clusters\Implementations\Resources\Defenders\Schemas\DefenderForm;
use App\Filament\Clusters\Implementations\Resources\Defenders\Tables\DefendersTable;
use App\Models\Defender;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DefenderResource extends Resource
{
    protected static ?string $model = Defender::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServerStack;

    protected static ?string $cluster = ImplementationsCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DefenderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DefendersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            GroupsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDefenders::route('/'),
            'create' => CreateDefender::route('/create'),
            'edit' => EditDefender::route('/{record}/edit'),
        ];
    }
}
