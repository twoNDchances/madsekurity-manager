<?php

namespace App\Filament\Resources\Wordlists\Schemas;

use App\Filament\Components\Forms\WordlistForm\WordlistForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class WordlistForm
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
                Components\Section::make('Wordlist Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    Components\Grid::make(1)
                    ->columnSpan(1)
                    ->schema([
                        self::name(),
                        self::description(),
                    ]),

                    Components\Fieldset::make('Words')
                    ->columnSpan(1)
                    ->columns(1)
                    ->schema([
                        self::wordsType(),
                        self::wordsFile(),
                        self::wordsText(),
                    ]),
                ]),

                Components\Section::make('Wordlist Labels')
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    self::labels(),
                ]),
            ]),
        ];
    }
}
