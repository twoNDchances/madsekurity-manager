<?php

namespace App\Filament\Components\Generals;

use Filament\Support\Colors\Color;
use Filament\Tables\Columns;

trait GeneralTable
{
    public static function textColumn(string $name, $label = null)
    {
        return Columns\TextColumn::make($name)
        ->label($label)
        ->searchable()
        ->toggleable()
        ->sortable();
    }

    public static function booleanColumn(string $name, $label = null)
    {
        return Columns\IconColumn::make($name)
        ->label($label)
        ->searchable()
        ->toggleable()
        ->sortable()
        ->boolean();
    }

    public static function relationshipColumn(string $name, $label = null)
    {
        return self::textColumn($name, $label)
        ->expandableLimitedList()
        ->listWithLineBreaks()
        ->limitList(5)
        ->bulleted();
    }

    public static function colorColumn(string $name, $label = null)
    {
        return Columns\ColorColumn::make($name)
        ->label($label)
        ->searchable()
        ->toggleable()
        ->sortable();
    }

    public static function labels()
    {
        return self::relationshipColumn('labels.name', 'Labels')
        ->color(fn ($state, $record) => Color::hex($record->labels()->pluck('color', 'name')->toArray()[$state]))
        ->bulleted(false)
        ->badge();
    }

    public static function owner()
    {
        return self::textColumn('user.email', 'Belongs To')
        ->badge();
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
