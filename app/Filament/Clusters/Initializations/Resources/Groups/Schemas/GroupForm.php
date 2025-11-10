<?php

namespace App\Filament\Clusters\Initializations\Resources\Groups\Schemas;

use App\Filament\Components\Forms\GroupForm\GroupForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class GroupForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($rule = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Group Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    self::name(),
                    self::level(),
                    self::phase()->columnSpanFull(),
                    self::description()->columnSpanFull(),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Group Rules')
                    ->schema([
                        self::rules($rule)
                    ]),

                    Components\Section::make('Group Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
