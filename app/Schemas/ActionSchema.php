<?php

namespace App\Schemas;

use App\Schemas\Generals\Datatype;
use App\Schemas\Generals\Method;
use App\Schemas\Generals\Severity;
use App\Schemas\Generals\TimeZone;
use Symfony\Component\HttpFoundation\Response;

class ActionSchema
{
    use TimeZone, Method, Severity, Datatype;

    public static $types = [
        'herlpTexts' => [
            'allow'   => 'Stop all further action and allow passage.',
            'deny'    => 'Stop all further action and deny passage.',
            'log'     => 'Event logging.',
            'request' => 'Send an HTTP request.',
            'report'  => 'Send report information to Manager.',
            'suspect' => 'Increase the severity score for the HTTP lifecycle.',
            'setter'  => 'Set virtual variables for the HTTP lifecycle.',
            'header'  => 'Set or unset headers.',
            'body'    => 'Set or unset body.',
            'score'   => 'Modify the total score for evaluate.',
        ],
        'colors' => [
            'allow'   => 'success',
            'deny'    => 'danger',
            'log'     => 'info',
            'request' => 'orange',
            'report'  => 'primary',
            'suspect' => 'purple',
            'setter'  => 'pink',
            'header'  => 'teal',
            'body'    => 'cyan',
            'score'   => 'rose',
        ],
        'options' => [
            'allow'   => 'Allow',
            'deny'    => 'Deny',
            'log'     => 'Log',
            'request' => 'Request',
            'report'  => 'Report',
            'suspect' => 'Suspect',
            'setter'  => 'Setter',
            'header'  => 'Header',
            'body'    => 'Body',
            'score'   => 'Score',
        ],
    ];

    public static function status()
    {
        return collect(Response::$statusTexts)
        ->mapWithKeys(fn ($status, $code) => [$code => "$code $status"])
        ->toArray();
    }

    public static function datatype()
    {
        unset(self::$datatypes['options']['array'], self::$datatypes['colors']['array']);
        return self::$datatypes;
    }

    public static $directives = [
        'headers' => [
            'colors' => [
                'set'   => 'info',
                'unset' => 'danger',
            ],
            'options' => [
                'set'   => 'Set',
                'unset' => 'Unset',
            ],
        ],
        'body' => [
            'colors' => [
                'set'   => 'info',
                'unset' => 'danger',
            ],
            'options' => [
                'set'   => 'Set',
                'unset' => 'Unset',
            ],
        ],
        'score' => [
            'colors' => [
                'hard'     => 'pink',
                'operator' => 'purple',
            ],
            'options' => [
                'hard'     => 'Hard',
                'operator' => 'Operator',
            ],
        ],
    ];
}
