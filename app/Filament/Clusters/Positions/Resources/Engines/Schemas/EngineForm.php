<?php

namespace App\Filament\Clusters\Positions\Resources\Engines\Schemas;

use App\Filament\Components\Forms\EngineForm\EngineForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class EngineForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($target = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Engine Definition')
                ->columnSpan(2)
                ->columns(5)
                ->schema([
                    self::name()->columnSpanFull(),
                    self::inputDatatype(),
                    Components\Grid::make(1)
                    ->columnSpan(3)
                    ->columns(1)
                    ->schema([
                        self::type(),
                        Components\Fieldset::make('Configuration')
                        ->columns(1)
                        ->schema([
                            self::indexOf(),
                            self::number(),
                            self::hash(),
                        ]),
                    ]),
                    self::outputDatatype(),
                ]),

                Components\Section::make('Engine Labels')
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    self::labels(),
                ]),
            ]),
        ];
    }
}
