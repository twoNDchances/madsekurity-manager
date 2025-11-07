<?php

namespace App\Filament\Components\Tables\ActionTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\ActionSchema;

trait ActionTable
{
    use GeneralTable, ActionAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function type()
    {
        return self::textColumn('type')
        ->formatStateUsing(fn ($state) => ActionSchema::$types['options'][$state])
        ->color(fn ($state) => ActionSchema::$types['colors'][$state])
        ->badge();
    }

    public static function contentId()
    {
        return self::relationshipColumn('content.name', 'Content');
    }

    public static function wordlistId()
    {
        return self::relationshipColumn('wordlist.name', 'Wordlist');
    }
}
