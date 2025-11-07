<?php

namespace App\Filament\Components\Forms\EngineForm;

use App\Filament\Clusters\Positions\Resources\Targets\Schemas\TargetForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Schemas\EngineSchema;
use App\Services\IdentificationService;

trait EngineForm
{
    use GeneralForm, EngineAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Engine Name')
        ->helperText('Simple name with kebab case about this Engine.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function inputDatatype()
    {
        return self::toggleButtons('input_datatype', 'Input Datatype', EngineSchema::$datatypes)
        ->afterStateUpdated(fn ($set) => [$set('type', null), $set('output_datatype', null)])
        ->inline(false)
        ->default('array')
        ->required()
        ->reactive();
    }

    public static function type()
    {
        return self::select('type')
        ->options(fn ($get) => EngineSchema::$typesOfDatatypes[$get('input_datatype')])
        ->afterStateUpdated(fn ($state, $set) => match ($state)
        {
            'addition',
            'subtraction',
            'multiplication',
            'division',
            'powerOf',
            'remainder',
            'length'            => $set('output_datatype', 'number'),

            'indexOf',
            'lower',
            'upper',
            'capitalize',
            'trim',
            'trimLeft',
            'trimRight',
            'removeWhitespace',
            'hash'              => $set('output_datatype', 'string'),
        })
        ->selectablePlaceholder(false)
        ->reactive()
        ->required();
    }

    public static function indexOf()
    {
        $condition = fn ($get) => $get('type') == 'indexOf';
        return self::textInput('index_of', 'Index Of', 'Engine Index Of')
        ->helperText('Access to element of array by specific index number.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->integer();
    }

    public static function number()
    {
        $condition = fn ($get) => in_array($get('type'), array_keys(EngineSchema::$typesOfDatatypes['number']));
        return self::textInput('number', placeholder: 'Engine Number')
        ->helperText(fn ($get) => 'A number used for ' . $get('type') . '.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->integer();
    }

    public static function hash()
    {
        $condition = fn ($get) => $get('type') == 'hash';
        return self::select('hash')
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('A hash function will used.')
        ->options(EngineSchema::$hashes)
        ->required($condition)
        ->visible($condition)
        ->default('md5');
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Engine...');
    }

    public static function outputDatatype()
    {
        return self::toggleButtons('output_datatype', 'Output Datatype', EngineSchema::$datatypes)
        ->inline(false)
        ->disabled();
    }

    public static function targets($create = true)
    {
        return IdentificationService::use(
            self::select('targets')
            ->helperText('Select multiple Targets for Engine Definition.')
            ->relationship('targets', 'name')
            ->multiple(),
            fn() => TargetForm::main(false),
            'target',
            'modal',
            $create,
        );
    }
}
