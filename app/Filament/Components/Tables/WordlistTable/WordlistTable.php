<?php

namespace App\Filament\Components\Tables\WordlistTable;

use App\Filament\Components\Generals\GeneralTable;

trait WordlistTable
{
    use GeneralTable, WordlistAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function wordsCount()
    {
        return self::textColumn('words_count', 'Words Count')
        ->numeric();
    }
}
