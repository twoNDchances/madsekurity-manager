<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Components\Forms\UserForm\UserForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class UserForm
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
                Components\Section::make('User Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    self::name(),
                    self::email(),
                    self::password()->columnSpanFull(),
                    self::canLogin(),
                    self::isAdmin(),
                ]),

                Components\Section::make('User Policy'),
            ]),
        ];
    }
}
