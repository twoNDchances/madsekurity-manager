<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Components\Tables\UserTable\UserTable;
use App\Models\User;
use App\Services\IdentificationService;
use Filament\Tables\Table;

class UsersTable
{
    use UserTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::email(),
            self::isVerified(),
            self::canLogin(),
            self::policies(),
            self::labels(),
            self::owner(),
            self::createdAt(),
            self::updatedAt(),
        ])
        ->query(fn () => IdentificationService::filterImportant(User::class))
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(),
        ])
        ->toolbarActions([
            self::bulkActionGroup(false, [self::deleteBulkAction()]),
        ]);
    }
}
