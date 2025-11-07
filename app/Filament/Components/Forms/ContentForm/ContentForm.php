<?php

namespace App\Filament\Components\Forms\ContentForm;

use App\Filament\Clusters\Initialization\Resources\Actions\Schemas\ActionForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Schemas\ContentSchema;
use App\Services\IdentificationService;
use Filament\Forms\Components\CodeEditor\Enums\Language;

trait ContentForm
{
    use GeneralForm, ContentAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Content Name')
        ->helperText('Simple name with kebab case about this Content.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function type()
    {
        return self::toggleButtons('type', colorsAndOptions: ContentSchema::$types)
        ->default('html')
        ->reactive()
        ->required();
    }

    public static function raw()
    {
        return self::codeEditor('raw', language: fn ($get) => match ($get('type'))
        {
            'html' => Language::Html,
            'json' => Language::Json,
        })
        ->json(fn ($get) => $get('type') == 'json')
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Action...');
    }
}
