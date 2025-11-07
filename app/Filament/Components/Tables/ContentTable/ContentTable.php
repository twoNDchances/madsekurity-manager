<?php

namespace App\Filament\Components\Tables\ContentTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\ContentSchema;

trait ContentTable
{
    use GeneralTable, ContentAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function type()
    {
        return self::textColumn('type')
        ->formatStateUsing(fn ($state) => ContentSchema::$types['options'][$state])
        ->color(fn ($state) => ContentSchema::$types['colors'][$state])
        ->badge();
    }

    public static function length()
    {
        return self::textColumn('length')
        ->numeric();
    }
}
