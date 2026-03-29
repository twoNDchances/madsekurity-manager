<?php

namespace App\Schemas\Generals;

trait Method
{
    public static $methods = [
        'colors' => [
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
    ];
}
