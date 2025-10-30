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
            self::happenedAt(),
            self::address(),
            self::method(),
            self::route(),
            self::behaviorAction(),
            self::resourceType(),
            self::owner(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(),
        ])
        ->toolbarActions([
            self::bulkActionGroup(),
        ])
        ->defaultSort('created_at', 'desc');
    }
}
