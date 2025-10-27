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

                Components\Section::make('Permission Policies')
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    self::policies($policy)
                ]),
            ]),
        ];
    }
}
