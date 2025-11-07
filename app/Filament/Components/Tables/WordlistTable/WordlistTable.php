<?php

namespace App\Filament\Components\Tables\WordlistTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\WordlistSchema;

trait WordlistTable
{
    use GeneralTable, WordlistAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function wordsType()
    {
        return self::textColumn('words_type', 'Words Type')
        ->formatStateUsing(fn ($state) => WordlistSchema::$wordsType['options'][$state])
        ->color(fn ($state) => WordlistSchema::$wordsType['colors'][$state])
        ->badge();
    }

    public static function wordsCount()
    {
        return self::textColumn('words_count', 'Words Count')
        ->numeric();
    }
}
