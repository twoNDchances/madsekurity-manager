<?php

namespace App\Filament\Resources\Permissions\Schemas;

use App\Filament\Components\Forms\PermissionForm\PermissionForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class PermissionForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($policy = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Permission Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    self::name(),
                    self::action(),
                    self::description()->columnSpanFull(),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Permission Policies')
                    ->schema([
                        self::policies($policy)
                    ]),

                    Components\Section::make('Permission Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
