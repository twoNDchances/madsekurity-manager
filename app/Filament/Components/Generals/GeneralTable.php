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

    public static function datetimeColumn(string $name, $label = null)
    {
        return self::textColumn($name, $label)
        ->dateTime();
    }

    public static function createdAt()
    {
        return self::datetimeColumn('created_at', 'Created At')
        ->toggledHiddenByDefault();
    }

    public static function updatedAt()
    {
        return self::datetimeColumn('updated_at', 'Updated At')
        ->toggledHiddenByDefault();
    }
}
