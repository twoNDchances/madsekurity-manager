<?php

namespace App\Filament\Clusters\Initialization\Resources\Actions\Schemas;

use App\Filament\Components\Forms\ActionForm\ActionForm as Form;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class ActionForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($content = true, $wordlist = true)
    {
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Section::make('Action Definition')
                ->columnSpan(2)
                ->columns(2)
                ->schema([
                    self::name(),
                    self::type(),
                    Components\Fieldset::make('Configuration')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        // Deny
                        self::denyStatus(),
                        self::denyBodyFromContentId($content),

                        // Log
                        self::logFormat()->columnSpanFull(),
                        self::logTimeZone()->columnSpanFull(),
                        self::logToConsole(),
                        self::logToFile(),

                        // Request
                        self::requestUrl()->columnSpanFull(),
                        self::requestMethod()->columnSpanFull(),
                        self::requestHeaders()->columnSpanFull(),
                        self::requestBodyFromContentId($content)->columnSpanFull(),
                        self::requestCertificate()->columnSpanFull(),

                        // Report

                        // Suspect
                        self::suspectSeverity()->columnSpanFull(),

                        // Setter
                        self::shareDirective(),
                        self::shareKeysFromWordlistId($wordlist),
                        self::shareVariables()->columnSpanFull(),

                        // Header
                        self::headerDirective(),
                        self::headerKeysFromWordlistId($wordlist),
                        self::headerSets()->columnSpanFull(),

                        // Body
                        self::bodyDirective(),
                        self::bodySets()->columnSpanFull(),
                        self::bodyUnsets()->columnSpanFull(),

                        // Score
                        self::scoreDirective(),
                        self::scoreNumber(),
                        self::scoreOperator()->columnSpanFull(),
                    ]),
                    self::description()->columnSpanFull(),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Action Rules')
                    ->schema([
                        //
                    ]),

                    Components\Section::make('Action Labels')
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
