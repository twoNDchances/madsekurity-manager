<?php

namespace App\Schemas\Generals;

trait Datatype
{
    public static $datatypes = [
        'colors' => [
            'array'  => 'warning',
            'number' => 'success',
            'string' => 'info',
        ],
        'options' => [
            'array'  => 'Array',
            'number' => 'Number',
            'string' => 'String',
        ],
    ];
}
