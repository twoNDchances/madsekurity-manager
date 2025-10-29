<?php

namespace App\Filament\Resources\Labels;

use App\Filament\Resources\Labels\Pages\CreateLabel;
use App\Filament\Resources\Labels\Pages\EditLabel;
use App\Filament\Resources\Labels\Pages\ListLabels;
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
            //
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
