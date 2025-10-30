<?php

namespace App\Filament\Components\Forms\WordlistForm;

use App\Filament\Components\Generals\GeneralForm;
use App\Rules\FileTextCheckingRule;

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

    public static function wordsUrl()
    {
        return self::fileUpload('words_url', 'Words', 'wordlists')
        ->helperText('Upload a plain-text file and each words will seperator by newline.')
        ->rules(
            [
                'mimetypes:text/plain',
                new FileTextCheckingRule(),
            ],
        )
        ->required();
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Wordlist...');
    }
}
