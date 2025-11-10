<?php

namespace App\Filament\Clusters\Initializations\Resources\Actions\Tables;

use App\Filament\Components\Tables\ActionTable\ActionTable;
use Filament\Tables\Table;

class ActionsTable
{
    use ActionTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::type(),
            self::contentId(),
            self::wordlistId(),
            self::rules(),
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
