<?php

namespace App\Filament\Components\Tables\BehaviorTable;

use App\Filament\Components\Generals\GeneralTable;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

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

    public static function resource()
    {
        return self::textColumn('resource')
        ->getStateUsing(fn ($record) => class_basename($record->resource_type))
        ->url(function ($record)
        {
            $resourceName = Str::lower(class_basename($record->resource_type));
            $routePrefix = null;
            switch ($resourceName)
            {
                case 'variable':
                case 'setting':
                    $routePrefix = 'filament.manager.configurations.resources.' . Str::plural($resourceName);
                    break;
                default:
                    $routePrefix = 'filament.manager.resources.' . Str::plural($resourceName);
                    break;
            }
            try
            {
                return route("$routePrefix.edit", ['record' => $record->resource_id]);
            }
            catch (RouteNotFoundException $exception)
            {
                return route("$routePrefix.index") . "?idNotFound=$record->resource_id";
            }
        })
        ->openUrlInNewTab();
    }
}
