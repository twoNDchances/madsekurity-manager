<?php

namespace App\Filament\Resources\Behaviors\Tables;

use App\Filament\Components\Tables\BehaviorTable\BehaviorTable;
use Filament\Tables\Table;

class BehaviorsTable
{
    use BehaviorTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::address(),
            self::method(),
            self::route(),
            self::behaviorAction(),
            self::resource(),
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
