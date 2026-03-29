<?php

namespace App\Filament\Components\Forms\DefenderForm;

use App\Filament\Clusters\Initializations\Resources\Groups\Schemas\GroupForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Schemas\DefenderSchema;
use App\Services\IdentificationService;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

trait DefenderForm
{
    use GeneralForm, DefenderAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Defender Name')
        ->helperText('Simple name with kebab case about this Defender.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function url()
    {
        return self::textInput('url', 'URL', 'Defender URL')
        ->prefixIcon(fn () => Heroicon::OutlinedGlobeAlt, true)
        ->helperText('Remote this Defender by using API.')
        ->required()
        ->url();
    }

    public static function isImportant()
    {
        $condition = fn () => IdentificationService::isImportant();
        return self::toggle('is_important', 'Is Important')
        ->helperText('Only used by important users.')
        ->required($condition)
        ->visible($condition)
        ->default(false);
    }
    
    public static function username()
    {
        return self::textInput('username', placeholder: 'Defender Username')
        ->required(fn ($get) => $get('password'))
        ->alphaDash();
    }

    public static function password()
    {
        return self::textInput('password', placeholder: 'Defender Password')
        ->required(fn ($get) => $get('username'))
        ->revealable()
        ->password();
    }

    public static function certificate()
    {
        return self::textArea('certificate', placeholder: 'Defender Certificate');
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Defender...');
    }

    public static function method($name)
    {
        return self::select("{$name}_method", 'Method')
        ->options(function () use ($name)
        {
            $options = DefenderSchema::$methods['options'];
            if (in_array($name, ['apply', 'revoke', 'implement', 'suspend']))
            {
                unset($options['GET']);
            }
            return $options;
        })
        ->default(fn () => match ($name)
        {
            'health',
            'inspect'   => 'GET',
            'apply',
            'implement' => 'PATCH',
            'revoke',
            'suspend'   => 'DELETE',
        })
        ->selectablePlaceholder(false)
        ->required();
    }

    public static function path($name)
    {
        return self::textInput("{$name}_path", 'Path', 'Defender ' . Str::ucfirst($name) . ' Path')
        ->default($name)
        ->alphaDash()
        ->required();
    }

    public static function log()
    {
        return self::textArea('log', 'Defender Log')
        ->disabled();
    }

    public static function groups($create = true)
    {
        return IdentificationService::use(
            self::select('groups')
            ->helperText('Select multiple Groups for Defender Definition.')
            ->relationship('groups', 'name')
            ->multiple(),
            fn () => GroupForm::main(false, false),
            'group',
            'modal',
            $create,
        );
    }
}
