<?php

namespace App\Filament\Resources\Labels\Tables;

use App\Filament\Components\Tables\LabelTable\LabelTable;
use Filament\Tables\Table;

class LabelsTable
{
    use LabelTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::color(),
            self::preview(),
            self::owner(),
            self::createdAt(),
            self::updatedAt(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(),
        ])
        ->toolbarActions([
            self::bulkActionGroup(),
        ]);
    }
}
