<?php

namespace App\Services;

use App\Models\Behavior;

class BehaviorService
{
    public static function perform($resource, $action)
    {
        return Behavior::create(
            [
                'address'       => request()->getClientIp(),
                'method'        => request()->getMethod(),
                'headers'       => request()->headers->all(),
                'body'          => request()->getContent(),
                'route'         => request()->path(),
                'action'        => $action,
                'resource_type' => $resource::class,
                'resource_id'   => $resource->id,
                'user_id'       => IdentificationService::getId(),
            ],
        );
    }
}
