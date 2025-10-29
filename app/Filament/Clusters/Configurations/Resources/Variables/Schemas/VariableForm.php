<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Schemas;

use App\Filament\Components\Forms\VariableForm\VariableForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class VariableForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($setting = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Variable Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    Components\Grid::make(1)
                    ->columnSpan(1)
                    ->schema([
                        self::key(),
                        self::isSecret(),
                    ]),

                    self::value(),
                    self::description()->columnSpanFull(),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    Components\Section::make('Variable Setting')
                    ->schema([
                        self::setting($setting),
                    ]),

                    Components\Section::make('Variable Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
