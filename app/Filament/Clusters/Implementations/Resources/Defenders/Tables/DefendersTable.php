<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\Tables;

use App\Filament\Components\Tables\DefenderTable\DefenderTable;
use App\Models\Defender;
use App\Services\IdentificationService;
use Filament\Tables\Table;

class DefendersTable
{
    use DefenderTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::status(),
            self::url(),
            self::groups(),
            self::labels(),
            self::owner(),
            self::createdAt(),
            self::updatedAt(),
        ])
        ->query(fn () => IdentificationService::filterImportant(Defender::class))
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(more: [self::healthAction(), self::inspectAction()]),
        ])
        ->toolbarActions([
            self::bulkActionGroup(),
        ]);
    }
}
