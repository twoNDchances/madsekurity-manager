<?php

namespace App\Filament\Resources\Behaviors\Schemas;

use App\Filament\Components\Forms\BehaviorForm\BehaviorForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class BehaviorForm
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
            Components\Grid::make(2)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Behavior Definition')
                ->columns(3)
                ->schema([
                    Components\Grid::make(2)
                    ->columnSpan(2)
                    ->schema([
                        self::belongsTo()->columnSpanFull(),
                        self::address(),
                        self::behaviorAction(),
                    ]),

                    self::method(),
                    self::route()->columnSpanFull(),

                    Components\Fieldset::make('Resource')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        self::resourceType(),
                        self::resourceId(),
                        self::resourceUrl()->columnSpanFull(),
                    ]),
                ]),

                Components\Section::make('Behavior Information')
                ->columns(1)
                ->schema([
                    self::headers(),
                    self::body(),
                ]),
            ]),
        ];
    }
}
