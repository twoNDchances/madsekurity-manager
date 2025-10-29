<?php

namespace App\Filament\Clusters\Configurations\Resources\Settings\Schemas;

use App\Filament\Components\Forms\SettingForm\SettingForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class SettingForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($variable = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Setting Definition')
                ->columnSpan(2)
                ->columns(1)
                ->schema([
                    self::name(),
                    self::description(),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    Components\Section::make('Setting Variables')
                    ->schema([
                        self::hasVariables($variable),
                    ]),

                    Components\Section::make('Setting Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
