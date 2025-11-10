<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups;

use App\Filament\Clusters\Initializations\InitializationsCluster;
use App\Filament\Clusters\Initializations\Resources\Groups\Pages\CreateGroup;
use App\Filament\Clusters\Initializations\Resources\Groups\Pages\EditGroup;
use App\Filament\Clusters\Initializations\Resources\Groups\Pages\ListGroups;
use App\Filament\Clusters\Initializations\Resources\Groups\RelationManagers\RulesRelationManager;
use App\Filament\Clusters\Initializations\Resources\Groups\Schemas\GroupForm;
use App\Filament\Clusters\Initializations\Resources\Groups\Tables\GroupsTable;
use App\Models\Group;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $cluster = InitializationsCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return GroupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RulesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGroups::route('/'),
            'create' => CreateGroup::route('/create'),
            'edit' => EditGroup::route('/{record}/edit'),
        ];
    }
}
