<?php

namespace App\Filament\Clusters\Initialization\Resources\Rules\Schemas;

use App\Filament\Components\Forms\RuleForm\RuleForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class RuleForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($target = true, $wordlist = true, $action = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Wizard::make([
                    Components\Wizard\Step::make('Rule Preparation')
                    ->schema([
                        self::name(),
                        self::phase(),
                        self::description()->columnSpanFull(),
                    ]),

                    Components\Wizard\Step::make('Rule Definition')
                    ->schema([
                        self::targetId($target),
                        self::comparator(),
                        self::isInverse()->columnSpanFull(),
                        self::value()->columnSpanFull(),
                        self::number()->columnSpanFull(),
                        self::rangeFrom(),
                        self::rangeTo(),
                        self::wordlistId($wordlist)->columnSpanFull(),
                    ]),
                ])
                ->columnSpan(2)
                ->columns(2),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Rule Actions')
                    ->schema([
                        self::actions($action),
                    ]),

                    Components\Section::make('Rule Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
