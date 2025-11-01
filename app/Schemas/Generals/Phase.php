<?php

namespace App\Schemas\Generals;

trait Phase
{
    public static $phases = [
        'colors' => [
            0 => 'purple',
            1 => 'primary',
            2 => 'info',
            3 => 'rose',
            4 => 'danger',
            5 => 'pink',
        ],
        'options' => [
            0 => '0. Request: Full',
            1 => '1. Request: Headers',
            2 => '2. Request: Body',
            3 => '3. Response: Headers',
            4 => '4. Response: Body',
            5 => '5. Response: Full',
        ],
    ];
}
