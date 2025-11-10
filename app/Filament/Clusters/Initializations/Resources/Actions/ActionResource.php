<?php

namespace App\Filament\Clusters\Initializations\Resources\Actions;

use App\Filament\Clusters\Initializations\InitializationsCluster;
use App\Filament\Clusters\Initializations\Resources\Actions\Pages\CreateAction;
use App\Filament\Clusters\Initializations\Resources\Actions\Pages\EditAction;
use App\Filament\Clusters\Initializations\Resources\Actions\Pages\ListActions;
use App\Filament\Clusters\Initializations\Resources\Actions\RelationManagers\RulesRelationManager;
use App\Filament\Clusters\Initializations\Resources\Actions\Schemas\ActionForm;
use App\Filament\Clusters\Initializations\Resources\Actions\Tables\ActionsTable;
use App\Models\Action;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActionResource extends Resource
{
    protected static ?string $model = Action::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFire;

    protected static ?string $cluster = InitializationsCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ActionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActionsTable::configure($table);
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
            'index' => ListActions::route('/'),
            'create' => CreateAction::route('/create'),
            'edit' => EditAction::route('/{record}/edit'),
        ];
    }
}
