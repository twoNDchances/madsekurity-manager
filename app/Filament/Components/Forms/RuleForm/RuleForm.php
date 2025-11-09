<?php

namespace App\Filament\Components\Forms\RuleForm;

use App\Filament\Clusters\Positions\Resources\Targets\Schemas\TargetForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Wordlists\Schemas\WordlistForm;
use App\Models\Target;
use App\Schemas\RuleSchema;
use App\Services\IdentificationService;
use App\Services\TargetService;

trait RuleForm
{
    use GeneralForm, RuleAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Rule Name')
        ->helperText('Simple name with kebab case about this Rule.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function phase()
    {
        return self::toggleButtons('phase', colorsAndOptions: RuleSchema::$phases)
        ->default(0)
        ->reactive()
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Rule...');
    }

    public static function targetId($create = true)
    {
        $target = fn ($state) => Target::find($state);
        return IdentificationService::use(
            self::select('target_id', 'Target')
            ->relationship(
                'target',
                'name',
                fn ($query, $get) => $query->where('phase', $get('phase')),
            )
            ->helperText('Select single Target for Rule Definition.'),
            fn () => TargetForm::main(false),
            'target',
            'modal',
            $create,
        )
        ->prefix(function ($state) use ($target)
        {
            $target = $target($state);
            if (!$target)
            {
                return null;
            }
            $datatype = $target->datatype;
            return RuleSchema::$datatypes['options'][$datatype];
        })
        ->suffix(function ($state) use ($target)
        {
            $target = $target($state);
            if (!$target)
            {
                return null;
            }
            $datatype = TargetService::getFinalDatatype($target);
            return RuleSchema::$datatypes['options'][$datatype];
        })
        ->afterStateUpdated(fn ($set) => $set('comparator', null))
        ->required()
        ->reactive();
    }

    public static function comparator()
    {
        $target = fn ($state) => Target::find($state);
        return self::select('comparator')
        ->helperText(function ($state, $get) use ($target)
        {
            $target = $target($get('target_id'));
            if (!$target || !$state)
            {
                return null;
            }
            $datatype = TargetService::getFinalDatatype($target);
            return RuleSchema::$comparatorsOfDatatypes[$datatype]['helperText'][$state];
        })
        ->options(function ($get) use ($target)
        {
            $target = $target($get('target_id'));
            if (!$target)
            {
                return null;
            }
            $datatype = TargetService::getFinalDatatype($target);
            return RuleSchema::$comparatorsOfDatatypes[$datatype]['options'];
        })
        ->required()
        ->reactive();
    }

    public static function isInverse()
    {
        return self::toggle('is_inverse', 'Is Inverse')
        ->helperText('Enable to invert the comparator.')
        ->default(false)
        ->required();
    }

    public static function value()
    {
        $condition = fn ($get) => in_array($get('comparator'), RuleSchema::$conditions['value']);
        return self::textArea('value', placeholder: 'Rule Value')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition);
    }

    public static function number()
    {
        $condition = fn ($get) => in_array($get('comparator'), RuleSchema::$conditions['number']);
        return self::textInput('number', placeholder: 'Rule Number')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->integer()
        ->numeric();
    }

    public static function rangeFrom()
    {
        $condition = fn ($get) => in_array($get('comparator'), RuleSchema::$conditions['range']);
        return self::textInput('range_from', 'From', 'Rule Range From')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->integer()
        ->numeric();
    }

    public static function rangeTo()
    {
        $condition = fn ($get) => in_array($get('comparator'), RuleSchema::$conditions['range']);
        return self::textInput('range_to', 'To', 'Rule Range To')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->integer()
        ->numeric();
    }

    public static function wordlistId($create = true)
    {
        $condition = fn ($get) => in_array($get('comparator'), RuleSchema::$conditions['wordlist']);
        return IdentificationService::use(
            self::select('wordlist_id', 'Wordlist')
            ->helperText('Wordlist containing the elements for comparation.')
            ->relationship('wordlist', 'name'),
            fn () => WordlistForm::main(),
            'wordlist',
            'modal',
            $create,
        )
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition);
    }

    public static function actions($create = true)
    {
        return IdentificationService::use(
            self::select('actions')
            ->helperText('Select multiple Actions for Rule Definition.')
            ->relationship('actions', 'name')
            ->multiple(),
            fn () => self::openActionForm(),
            'action',
            'open',
            $create,
        );
    }
}
