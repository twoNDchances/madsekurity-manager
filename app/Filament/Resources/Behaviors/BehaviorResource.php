<?php

namespace App\Filament\Resources\Behaviors;

use App\Filament\Resources\Behaviors\Pages\CreateBehavior;
use App\Filament\Resources\Behaviors\Pages\EditBehavior;
use App\Filament\Resources\Behaviors\Pages\ListBehaviors;
use App\Filament\Resources\Behaviors\Schemas\BehaviorForm;
use App\Filament\Resources\Behaviors\Tables\BehaviorsTable;
use App\Models\Behavior;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BehaviorResource extends Resource
{
    protected static ?string $model = Behavior::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFingerPrint;

    protected static string|UnitEnum|null $navigationGroup = 'Audits';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return BehaviorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BehaviorsTable::configure($table);
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
            'index' => ListBehaviors::route('/'),
            'create' => CreateBehavior::route('/create'),
            'edit' => EditBehavior::route('/{record}/edit'),
        ];
    }
}
