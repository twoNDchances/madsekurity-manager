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

                Components\Section::make('Setting Variables')
                ->columnSpan(1)
                ->columns(1)
                ->schema([
                    self::hasVariables($variable),
                ]),
            ]),
        ];
    }
}
