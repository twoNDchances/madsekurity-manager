<?php

namespace App\Filament\Components\Forms\TargetForm;

use App\Filament\Clusters\Positions\Resources\Engines\Schemas\EngineForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Wordlists\Schemas\WordlistForm;
use App\Models\Context;
use App\Schemas\TargetSchema;

trait TargetForm
{
    use GeneralForm, TargetAction;

    public static function phase()
    {
        return self::toggleButtons('phase', colorsAndOptions: TargetSchema::$phases)
        ->afterStateUpdated(fn ($set) => [
            $set('type', 'getter'),
            $set('is_context', false),
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
        ->afterStateUpdated(fn ($state, $set) => match ($state)
        {
            'full'  => $set('is_context', true),
            default => $set('is_context', false),
        })
        ->default('getter')
        ->reactive()
        ->required();
    }

    public static function isContext()
    {
        $required  = fn ($get) => $get('type') != 'getter';
        $condition = fn ($get) => !$required($get) || $get('type') == 'full';
        return self::toggle('is_context', 'Is Context')
        ->disabled(fn ($get) => $condition($get))
        ->helperText('Mark this Target will use a Context.')
        ->required($required)
        ->dehydrated()
        ->reactive();
    }

    public static function contextId()
    {
        $condition = fn ($get) => $get('is_context');
        return self::select('context_id', 'Context')
        ->relationship(
            'context',
            'name',
            fn ($query, $get) => $query->where('phase', (int) $get('phase'))->where('type', $get('type')),
        )
        ->afterStateUpdated(fn ($state, $set) => $set('datatype', Context::find($state)->datatype))
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
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
        ->disabled(fn ($get) => $get('is_context'))
        ->default('array')
        ->reactive()
        ->required();
    }

    public static function wordlistId()
    {
        $condition = fn ($get) => $get('datatype') == 'array' && !$get('is_context');
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
