<?php

namespace App\Filament\Clusters\Positions\Resources\Targets\Schemas;

use App\Filament\Components\Forms\TargetForm\TargetForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TargetForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($engine = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Wizard::make([
                    Components\Wizard\Step::make('Target Preparation')
                    ->completedIcon(fn () => Heroicon::OutlinedCheck)
                    ->schema([
                        self::phase(),

                        Components\Grid::make(1)
                        ->schema([
                            self::type(),
                            self::isContext(),
                            self::contextId(),
                        ]),
                    ]),

                    Components\Wizard\Step::make('Target Definition')
                    ->schema([
                        self::name(),

                        Components\Grid::make(1)
                        ->schema([
                            self::datatype(),
                            self::wordlistId(),
                        ]),

                        self::description()->columnSpanFull(),
                    ]),
                ])
                ->columnSpan(2)
                ->columns(2),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Target Engines')
                    ->columnSpan(1)
                    ->schema([
                        self::engines($engine),
                    ]),

                    Components\Section::make('Target Labels')
                    ->columnSpan(1)
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
