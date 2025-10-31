<?php

namespace App\Schemas;

class TargetSchema
{
    public static $phases = [
        'colors' => [
            1 => 'indigo',
            2 => 'primary',
            3 => 'rose',
            4 => 'danger',
        ],
        'options' => [
            1 => '1. Request: Headers',
            2 => '2. Request: Body',
            3 => '3. Response: Headers',
            4 => '4. Response: Body',
        ],
    ];

    public static $types = [
        'colors' => [
            'target' => 'purple',
            'getter' => 'pink',
            'header' => 'info',
            'query'  => 'warning',
            'body'   => 'sky',
            'file'   => 'teal',
        ],
        'options' => [
            'target' => 'Target',
            'getter' => 'Getter',
            'header' => 'Header',
            'query'  => 'Query',
            'body'   => 'Body',
            'file'   => 'File',
        ],
    ];

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
