<?php

namespace App\Filament\Components\Generals;

use Filament\Tables\Columns;

trait GeneralTable
{
    public static function textColumn(string $name, $label = null)
    {
        return Columns\TextColumn::make($name)
        ->label($label)
        ->searchable()
        ->sortable()
        ->toggleable();
    }

    public static function owner()
    {
        return self::textColumn('user.email', 'Belongs To')
        ->badge();
    }

    public static function booleanColumn(string $name, $label = null)
    {
        return Columns\IconColumn::make($name)
        ->label($label)
        ->searchable()
        ->sortable()
        ->toggleable()
        ->boolean();
    }

    public static function relationshipColumn(string $name, $label = null)
    {
        return self::textColumn($name, $label)
        ->limitList(5)
        ->bulleted()
        ->listWithLineBreaks()
        ->expandableLimitedList();
    }
}
