<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\Schemas;

use App\Filament\Components\Forms\DefenderForm\DefenderForm as Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;

class DefenderForm
{
    use Form;

    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components(self::main());
    }

    public static function main($group = true, $evaluator = true)
    {
        $condition = fn ($livewire) => $livewire instanceOf EditRecord;
        return [
            Components\Grid::make(3)
            ->columnSpanFull()
            ->schema([
                Components\Tabs::make()
                ->activeTab(fn ($livewire) => $condition($livewire) ? 3 : 1)
                ->columnSpan(2)
                ->schema([
                    Components\Tabs\Tab::make('Defender Definition')
                    ->columns(3)
                    ->schema([
                        self::name()->columnSpan(1),
                        self::url()->columnSpan(2),
                        self::isImportant()->columnSpanFull(),

                        Components\Fieldset::make('Protection')
                        ->columnSpanFull()
                        ->columns(2)
                        ->schema([
                            self::username(),
                            self::password(),
                            self::certificate()->columnSpanFull(),
                        ]),

                        self::description()->columnSpanFull(),
                    ]),

                    Components\Tabs\Tab::make('Defender Communication')
                    ->columns(2)
                    ->schema([
                        Components\Fieldset::make('Informations')
                        ->columns(2)
                        ->columnSpanFull()
                        ->schema([
                            Components\Fieldset::make('Health')
                            ->columns(1)
                            ->schema([
                                self::method('health'),
                                self::path('health'),
                            ]),

                            Components\Fieldset::make('Inspect')
                            ->columns(1)
                            ->schema([
                                self::method('inspect'),
                                self::path('inspect'),
                            ]),
                        ]),

                        Components\Fieldset::make('Groups')
                        ->columns(1)
                        ->schema([
                            Components\Fieldset::make('Apply')
                            ->columns(1)
                            ->schema([
                                self::method('apply'),
                                self::path('apply'),
                            ]),

                            Components\Fieldset::make('Revoke')
                            ->columns(1)
                            ->schema([
                                self::method('revoke'),
                                self::path('revoke'),
                            ]),
                        ]),

                        Components\Fieldset::make('Evaluators')
                        ->columns(1)
                        ->schema([
                            Components\Fieldset::make('Implement')
                            ->columns(1)
                            ->schema([
                                self::method('implement'),
                                self::path('implement'),
                            ]),

                            Components\Fieldset::make('Suspend')
                            ->columns(1)
                            ->schema([
                                self::method('suspend'),
                                self::path('suspend'),
                            ]),
                        ]),
                    ]),

                    Components\Tabs\Tab::make('Defender Action')
                    ->columns(1)
                    ->schema([
                        self::log()->columnSpanFull(),
                    ]),
                ]),

                Components\Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    Components\Section::make('Defender Groups')
                    ->collapsible()
                    ->collapsed($condition)
                    ->columns(1)
                    ->schema([
                        self::groups($group),
                    ]),

                    Components\Section::make('Defender Evaluators')
                    ->collapsible()
                    ->collapsed($condition)
                    ->columns(1)
                    ->schema([
                        //
                    ]),

                    Components\Section::make('Defender Labels')
                    ->collapsible()
                    ->collapsed($condition)
                    ->columns(1)
                    ->schema([
                        self::labels(),
                    ]),
                ]),
            ]),
        ];
    }
}
