<?php

namespace App\Schemas;

use App\Schemas\Generals\Datatype;
use App\Schemas\Generals\Phase;
use App\Schemas\Generals\Type;

class TargetSchema
{
    use Datatype, Phase, Type;

    public static $typesOfPhases = [
        0 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
            ],
        ],
        1 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
                'header' => 'info',
                'meta'   => 'danger',
                'query'  => 'warning',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
                'header' => 'Header',
                'meta'   => 'Meta',
                'query'  => 'Query',
            ],
        ],
        2 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
                'body'   => 'sky',
                'file'   => 'teal',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
                'body'   => 'Body',
                'file'   => 'File',
            ],
        ],
        3 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
                'header' => 'info',
                'meta'   => 'danger',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
                'header' => 'Header',
                'meta'   => 'Meta',
            ],
        ],
        4 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
                'body'   => 'sky',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
                'body'   => 'Body',
            ],
        ],
        5 => [
            'colors' => [
                'getter' => 'purple',
                'full'   => 'gray',
            ],
            'options' => [
                'getter' => 'Getter',
                'full'   => 'Full',
            ],
        ],
    ];
}
