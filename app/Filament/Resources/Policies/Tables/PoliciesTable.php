<?php

namespace App\Filament\Resources\Policies\Tables;

use App\Filament\Components\Tables\PolicyTable\PolicyTable;
use Filament\Tables\Table;

class PoliciesTable
{
    use PolicyTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::users(),
            self::permissions(),
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
        ]);
    }
}
