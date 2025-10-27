<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Components\Tables\UserTable\UserTable;
use Filament\Tables\Table;

class UsersTable
{
    use UserTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::email(),
            self::canLogin(),
            self::owner(),
        ])
        ->query(self::query())
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
