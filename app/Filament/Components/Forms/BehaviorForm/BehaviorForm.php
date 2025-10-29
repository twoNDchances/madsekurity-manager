<?php

namespace App\Filament\Components\Forms\BehaviorForm;

use App\Filament\Components\Generals\GeneralForm;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

trait BehaviorForm
{
    use GeneralForm, BehaviorAction;

    public static function belongsTo()
    {
        return self::select('user_id', 'Belongs To')->relationship('user', 'email')->disabled();
    }

    public static function address()
    {
        return self::textInput('address', placeholder: 'Behavior Address')->disabled();
    }

    public static function behaviorAction()
    {
        return self::textInput('action', placeholder: 'Behavior Action')->disabled();
    }

    public static function method()
    {
        return self::toggleButtons(
            'method',
            colorsAndOptions: [
                'colors'  => [
                    'GET'    => 'success',
                    'POST'   => 'warning',
                    'PUT'    => 'info',
                    'PATCH'  => 'primary',
                    'DELETE' => 'danger',
                ],
                'options' => [
                    'GET'    => 'GET',
                    'POST'   => 'POST',
                    'PUT'    => 'PUT',
                    'PATCH'  => 'PATCH',
                    'DELETE' => 'DELETE',
                ],
            ]
        )
        ->disabled();
    }

    public static function route()
    {
        return self::textInput('route', placeholder: 'Behavior Route')->disabled();
    }

    public static function resourceId()
    {
        return self::textInput('resource_id', 'ID', 'Behavior Resource ID')->disabled();
    }

    public static function resourceType()
    {
        return self::textInput('resource_type', 'Type', 'Behavior Resource Type')->disabled();
    }

    public static function resourceUrl()
    {
        return self::textInput('resource_url', 'URL', 'Behavior Resource URL')
        ->formatStateUsing(function ($record)
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
        ->suffixActions(
            [
                self::copyResourceUrl(),
                self::openResourceUrl(),
            ],
        )
        ->disabled()
        ->url();
    }

    public static function headers()
    {
        return self::textArea('headers', placeholder: 'Behavior Headers')->disabled();
    }

    public static function body()
    {
        return self::textArea('body', placeholder: 'Behavior Body')->disabled();
    }
}
