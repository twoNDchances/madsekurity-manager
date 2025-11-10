<?php

namespace App\Filament\Components\Forms\GroupForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Schemas\GroupSchema;
use App\Services\IdentificationService;

trait GroupForm
{
    use GeneralForm, GroupAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Group Name')
        ->helperText('Simple name with kebab case about this Group.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function level()
    {
        return self::textInput('level', placeholder: 'Group Level')
        ->minValue(0)
        ->default(0)
        ->required()
        ->integer();
    }

    public static function phase()
    {
        return self::toggleButtons('phase', colorsAndOptions: GroupSchema::$phases)
        ->afterStateUpdated(fn ($set) => $set('rules', null))
        ->default(0)
        ->reactive()
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Rule...');
    }

    public static function rules($create = true)
    {
        return IdentificationService::use(
            self::select('rules')
            ->helperText('Select multiple Rules for Group Definition.')
            ->relationship(
                'rules',
                'name',
                fn ($query, $get) => $query->where('phase', $get('phase')),
            )
            ->multiple(),
            fn () => self::openRuleForm(),
            'rule',
            'open',
            $create,
        );
    }
}
