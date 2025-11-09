<?php

namespace App\Filament\Clusters\Initialization\Resources\Rules\Tables;

use App\Filament\Components\Tables\RuleTable\RuleTable;
use Filament\Tables\Table;

class RulesTable
{
    use RuleTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::phase(),
            self::targetId(),
            self::comparator(),
            self::wordlistId(),
            self::actions(),
            self::labels(),
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
