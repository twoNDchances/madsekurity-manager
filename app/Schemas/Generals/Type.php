<?php

namespace App\Schemas\Generals;

trait Type
{
    public static $types = [
        'colors' => [
            'getter' => 'purple',
            'full'   => 'gray',
            'header' => 'info',
            'meta'   => 'danger',
            'query'  => 'warning',
            'body'   => 'sky',
            'file'   => 'teal',
        ],
        'options' => [
            'getter' => 'Getter',
            'full'   => 'Full',
            'header' => 'Header',
            'meta'   => 'Meta',
            'query'  => 'Query',
            'body'   => 'Body',
            'file'   => 'File',
        ],
    ];
}
