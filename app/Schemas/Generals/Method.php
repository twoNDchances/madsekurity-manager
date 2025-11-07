<?php

namespace App\Schemas\Generals;

trait Method
{
    public static $methods = [
        'colors' => [
            'HEAD'   => 'teal',
            'GET'    => 'success',
            'POST'   => 'warning',
            'PUT'    => 'info',
            'PATCH'  => 'primary',
            'DELETE' => 'danger',
        ],
        'options' => [
            'HEAD'   => 'HEAD',
            'GET'    => 'GET',
            'POST'   => 'POST',
            'PUT'    => 'PUT',
            'PATCH'  => 'PATCH',
            'DELETE' => 'DELETE',
        ],
    ];
}
