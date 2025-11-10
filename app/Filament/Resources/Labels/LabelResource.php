<?php

namespace App\Filament\Resources\Labels;

use App\Filament\Resources\Labels\Pages\CreateLabel;
use App\Filament\Resources\Labels\Pages\EditLabel;
use App\Filament\Resources\Labels\Pages\ListLabels;
use App\Filament\Resources\Labels\RelationManagers\ActionsRelationManager;
use App\Filament\Resources\Labels\RelationManagers\ContentsRelationManager;
use App\Filament\Resources\Labels\RelationManagers\EnginesRelationManager;
use App\Filament\Resources\Labels\RelationManagers\PermissionsRelationManager;
use App\Filament\Resources\Labels\RelationManagers\PoliciesRelationManager;
use App\Filament\Resources\Labels\RelationManagers\RulesRelationManager;
use App\Filament\Resources\Labels\RelationManagers\SettingsRelationManager;
use App\Filament\Resources\Labels\RelationManagers\TargetsRelationManager;
use App\Filament\Resources\Labels\RelationManagers\UsersRelationManager;
use App\Filament\Resources\Labels\RelationManagers\VariablesRelationManager;
use App\Filament\Resources\Labels\RelationManagers\WordlistsRelationManager;
use App\Filament\Resources\Labels\Schemas\LabelForm;
use App\Filament\Resources\Labels\Tables\LabelsTable;
use App\Models\Label;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LabelResource extends Resource
{
    protected static ?string $model = Label::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaperClip;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = 'Utilities';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return LabelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LabelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RulesRelationManager::class,
            ActionsRelationManager::class,
            TargetsRelationManager::class,
            EnginesRelationManager::class,
            ContentsRelationManager::class,
            WordlistsRelationManager::class,
            UsersRelationManager::class,
            PoliciesRelationManager::class,
            PermissionsRelationManager::class,
            // VariablesRelationManager::class,
            // SettingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListLabels::route('/'),
            'create' => CreateLabel::route('/create'),
            'edit'   => EditLabel::route('/{record}/edit'),
        ];
    }
}
