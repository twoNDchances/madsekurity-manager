<?php

namespace App\Filament\Components\Forms\WordlistForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Rules\FileTextCheckingRule;
use App\Schemas\WordlistSchema;

trait WordlistForm
{
    use GeneralForm, WordlistAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Wordlist Name')
        ->helperText('Simple name with kebab case about this Wordlist.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function wordsType()
    {
        return self::toggleButtons('words_type', 'Type', WordlistSchema::$wordsType)
        ->default('file')
        ->reactive()
        ->required();
    }

    public static function wordsFile()
    {
        $condition = fn ($get) => $get('words_type') == 'file';
        return self::fileUpload('words_file', 'File', 'wordlists')
        ->helperText('Upload a plain-text file and each words will seperator by newline.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->rules(
            [
                'mimetypes:text/plain',
                new FileTextCheckingRule(),
            ],
        );
    }

    public static function wordsText()
    {
        $condition = fn ($get) => $get('words_type') == 'text';
        return self::textArea('words_text', 'Text', 'Words Text')
        ->helperText('Each words will seperator by newline.')
        ->required($condition)
        ->visible($condition);
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Wordlist...');
    }
}
