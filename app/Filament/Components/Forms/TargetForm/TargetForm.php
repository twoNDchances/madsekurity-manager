<?php

namespace App\Filament\Components\Forms\TargetForm;

use App\Filament\Clusters\Positions\Resources\Engines\Schemas\EngineForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Wordlists\Schemas\WordlistForm;
use App\Models\Context;
use App\Rules\DatatypeTransformingRule;
use App\Schemas\TargetSchema;

trait TargetForm
{
    use GeneralForm, TargetAction;

    public static function phase()
    {
        return self::toggleButtons('phase', colorsAndOptions: TargetSchema::$phases)
        ->afterStateUpdated(fn ($set) => [
            $set('type', 'getter'),
            $set('context_id', null),
        ])
        ->default(0)
        ->reactive()
        ->required();
    }

    public static function type()
    {
        return self::toggleButtons('type')
        ->options(fn ($get) => TargetSchema::$typesOfPhases[(int) $get('phase')]['options'])
        ->colors(fn ($get) => TargetSchema::$typesOfPhases[(int) $get('phase')]['colors'])
        ->default('getter')
        ->reactive()
        ->required();
    }

    public static function contextId()
    {
        return self::select('context_id', 'Context')
        ->relationship(
            'context',
            'name',
            fn ($query, $get) => $query->where('phase', (int) $get('phase'))->where('type', $get('type')),
        )
        ->afterStateUpdated(fn ($state, $set) => $set('datatype', Context::find($state)->datatype))
        ->disabled(fn ($get) => $get('type') == 'getter')
        ->required(fn ($get) => $get('type') == 'full')
        ->reactive();
    }

    public static function name()
    {
        return self::textInput('name', placeholder: 'Target Name')
        ->helperText('Simple name with kebab case about this Target.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function datatype()
    {
        return self::toggleButtons('datatype', colorsAndOptions: TargetSchema::$datatypes)
        ->disabled(fn ($get) => $get('context_id'))
        ->default('array')
        ->reactive()
        ->required();
    }

    public static function wordlistId()
    {
        $condition = fn ($get) => $get('datatype') == 'array' && !$get('context_id');
        return self::select('wordlist_id', 'Wordlist')
        ->disabled(fn ($get) => !$condition($get))
        ->relationship('wordlist', 'name')
        ->createOptionForm(WordlistForm::main())
        ->required($condition)
        ->visible($condition);
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Target...');
    }

    public static function engines($create = true)
    {
        $field = self::select('engines')
        ->rule(fn ($get) => new DatatypeTransformingRule($get('datatype'), 'target'))
        ->afterStateUpdated(fn ($record) => $record ? $record->engines()->detach() : null)
        ->helperText('Select multiple Engines for Target Definition.')
        ->relationship('engines', 'name')
        ->multiple();

        return match ($create)
        {
            true  => $field->createOptionForm(EngineForm::main(false)),
            false => $field,
        };
    }
}
