<?php

namespace App\Filament\Components\Tables\BehaviorTable;

use App\Filament\Components\Generals\GeneralTable;
use App\Schemas\BehaviorSchema;
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
        ->formatStateUsing(fn ($state) => BehaviorSchema::$methods['options'][$state])
        ->color(fn($state) => BehaviorSchema::$methods['colors'][$state])
        ->badge();
    }

    public static function route()
    {
        return self::textColumn('route');
    }

    public static function behaviorAction()
    {
        return self::textColumn('action')
        ->formatStateUsing(fn ($state) => BehaviorSchema::$actions['options'][$state])
        ->color(fn($state) => BehaviorSchema::$actions['colors'][$state])
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
