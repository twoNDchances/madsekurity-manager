<?php

namespace App\Filament\Resources\Policies\Schemas;

use App\Filament\Components\Forms\PolicyForm\PolicyForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class PolicyForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($permission = true, $user = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Policy Definition')
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
                    Components\Section::make('Policy Permissions')
                    ->schema([
                        self::permissions($permission)
                    ]),

                    Components\Section::make('Policy Users')
                    ->schema([
                        self::users($user)
                    ]),
                ]),
            ]),
        ];
    }
}
