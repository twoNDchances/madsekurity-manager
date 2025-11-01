<?php

namespace App\Filament\Clusters\Positions\Resources\Contexts\Schemas;

use App\Filament\Components\Forms\ContextForm\ContextForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class ContextForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main()
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Context Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    self::phase(),
                    self::type(),
                    self::name(),
                    self::datatype(),
                    self::description()->columnSpanFull(),
                ]),

                Components\Section::make('Context Targets')
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    self::hasTargets(),
                ]),
            ]),
        ];
    }
}
