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

    public static function main($policy = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('User Definition')
                ->columnSpan(2)
                ->columns(8)
                ->schema([
                    self::name()->columnSpan(4),
                    self::email()->columnSpan(4),
                    self::password()->columnSpanFull(),

                    Components\Fieldset::make('Behavior')
                    ->columnSpan(3)
                    ->columns(1)
                    ->schema([
                        self::canLogin(),
                        self::isImportant(),
                    ]),

                    Components\Fieldset::make('Verification')
                    ->columnSpan(5)
                    ->columns(1)
                    ->schema([
                        self::mustVerify(),
                        self::token(),
                    ]),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('User Policies')
                    ->columns(1)
                    ->schema([
                        self::policies($policy),
                    ]),

                    Components\Section::make('User Labels')
                    ->columns(1)
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
