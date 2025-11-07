<?php

namespace App\Filament\Resources\Contents\Schemas;

use App\Filament\Components\Forms\ContentForm\ContentForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class ContentForm
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
                Components\Section::make('Content Definition')
                ->columnSpan(2)
                ->columns(3)
                ->schema([
                    Components\Grid::make(1)
                    ->columnSpan(1)
                    ->schema([
                        self::name(),
                        self::description(),
                    ]),

                    Components\Fieldset::make()
                    ->columnSpan(2)
                    ->columns(1)
                    ->schema([
                        self::type(),
                        self::raw(),
                    ]),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Content Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
