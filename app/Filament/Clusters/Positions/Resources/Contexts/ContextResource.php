<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts;

use App\Filament\Clusters\Positions\PositionsCluster;
use App\Filament\Clusters\Positions\Resources\Contexts\Pages\CreateContext;
use App\Filament\Clusters\Positions\Resources\Contexts\Pages\EditContext;
use App\Filament\Clusters\Positions\Resources\Contexts\Pages\ListContexts;
use App\Filament\Clusters\Positions\Resources\Contexts\Schemas\ContextForm;
use App\Filament\Clusters\Positions\Resources\Contexts\Tables\ContextsTable;
use App\Models\Context;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContextResource extends Resource
{
    protected static ?string $model = Context::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $cluster = PositionsCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ContextForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContextsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContexts::route('/'),
            'create' => CreateContext::route('/create'),
            'edit' => EditContext::route('/{record}/edit'),
        ];
    }
}
