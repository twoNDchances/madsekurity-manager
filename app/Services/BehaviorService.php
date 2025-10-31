<?php

namespace App\Services;

use App\Models\Behavior;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class BehaviorService
{
    public static function perform($resource, $action)
    {
        $request = Request::capture();
        return Behavior::create(
            [
                'address'       => $request->getClientIp(),
                'method'        => $request->getMethod(),
                'headers'       => Json::encode($request->headers->all(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
                'body'          => $request->getContent(),
                'route'         => $request->path(),
                'action'        => $action,
                'resource_type' => $resource::class,
                'resource_id'   => $resource->id,
                'user_id'       => IdentificationService::getId(),
            ],
        );
    }

    public static function getResourceUrl(Behavior $behavior)
    {
        $resourceName = Str::lower(class_basename($behavior->resource_type));
        $routePrefix = null;
        switch ($resourceName)
        {
            case 'target':
            case 'engine':
                $routePrefix = 'filament.manager.positions.resources.' . Str::plural($resourceName);
                break;
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
            return route("$routePrefix.edit", ['record' => $behavior->resource_id]);
        }
        catch (RouteNotFoundException $exception)
        {
            return route("$routePrefix.index") . "?idNotFound=$behavior->resource_id";
        }
    }
}
