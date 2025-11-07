<?php

namespace App\Schemas\Generals;

trait Severity
{
    public static $severities = [
        'colors' => [
            'info'      => 'info',
            'notice'    => 'success',
            'warning'   => 'warning',
            'error'     => 'danger',
            'critical'  => 'rose',
            'alert'     => 'pink',
            'emergency' => 'purple',
        ],
        'options' => [
            'info'      => 'INFO',
            'notice'    => 'NOTICE',
            'warning'   => 'WARNING',
            'error'     => 'ERROR',
            'critical'  => 'CRITICAL',
            'alert'     => 'ALERT',
            'emergency' => 'EMERGENCY',
        ],
    ];
}
