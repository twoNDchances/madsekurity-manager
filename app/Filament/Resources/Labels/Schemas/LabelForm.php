<?php

namespace App\Filament\Resources\Labels\Schemas;

use App\Filament\Components\Forms\LabelForm\LabelForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class LabelForm
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
            Components\Section::make()
            ->columnSpanFull()
            ->columns(2)
            ->schema([
                self::name(),
                self::color(),
                self::description()->columnSpanFull(),
            ]),
        ];
    }
}
