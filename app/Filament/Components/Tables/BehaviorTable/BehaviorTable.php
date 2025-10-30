<?php

namespace App\Filament\Components\Tables\BehaviorTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Services\BehaviorService;

trait BehaviorTable
{
    use GeneralTable, BehaviorAction;

    public static function address()
    {
        return self::textColumn('address');
    }

    public static function method()
    {
        return self::textColumn('method')
        ->color(fn($state) => match ($state)
        {
            'GET'    => 'success',
            'POST'   => 'warning',
            'PUT'    => 'info',
            'PATCH'  => 'primary',
            'DELETE' => 'danger',
            default  => 'pink',
        })
        ->badge();
    }

    public static function route()
    {
        return self::textColumn('route');
    }

    public static function behaviorAction()
    {
        return self::textColumn('action')
        ->color(fn ($state) => match ($state)
        {
            'Create' => 'success',
            'Update' => 'info',
            'Delete' => 'danger',
            default  => 'warning',
        })
        ->badge();
    }

    public static function resourceType()
    {
        return self::textColumn('resource_type', 'Resource Type')
        ->url(fn ($record) => BehaviorService::getResourceUrl($record))
        ->formatStateUsing(fn ($state) => class_basename($state))
        ->openUrlInNewTab();
    }

    public static function happenedAt()
    {
        return self::createdAt()
        ->toggledHiddenByDefault(false)
        ->label('Happened At');
    }
}
