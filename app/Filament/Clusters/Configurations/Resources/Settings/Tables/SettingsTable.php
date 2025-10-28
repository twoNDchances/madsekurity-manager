<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Tables;

use App\Filament\Components\Tables\SettingTable\SettingTable;
use Filament\Tables\Table;

class SettingsTable
{
    use SettingTable;

    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            self::name(),
            self::hasVariables(),
            self::owner(),
            self::createdAt(),
            self::updatedAt(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            self::actionGroup(more: [self::cloneSetting()]),
        ])
        ->toolbarActions([
            self::bulkActionGroup(),
        ]);
    }
}
