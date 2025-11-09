<?php

namespace App\Schemas;

use App\Schemas\Generals\Datatype;
use App\Schemas\Generals\Phase;

class RuleSchema
{
    use Phase, Datatype;

    public static $comparators = [
        'colors' => [
            //
        ],
        'options' => [
            '@similar'            => 'Similar',
            '@contains'           => 'Contains',
            '@match'              => 'Match',
            '@search'             => 'Search',
            '@equal'              => 'Equal',
            '@greaterThan'        => 'Greater Than',
            '@lessThan'           => 'Less Than',
            '@greaterThanOrEqual' => 'Greater Than or Equal',
            '@lessThanOrEqual'    => 'Less Than or Equal',
            '@inRange'            => 'In Range',
            '@mirror'             => 'Mirror',
            '@startsWith'         => 'Starts With',
            '@endsWith'           => 'Ends With',
            '@check'              => 'Check',
            '@regExp'             => 'RegExp',
            '@checkRegExp'        => 'Check RegExp',
        ],
    ];

    public static $comparatorsOfDatatypes = [
        'array' => [
            'helperText' => [
                '@similar'  => 'Target[Array] @ Value[Wordlist]: True if the value of the first element in Target matches the value of the first element in Wordlist.',
                '@contains' => 'Target[Array] @ Value[String]: True if the value of the first element in Target matches the value given.',
                '@match'    => 'Target[Array] @ Value[String]: True if the value of the first element in Target matches the value given using RegExp.',
                '@search'   => 'Target[Array] @ Value[Wordlist]: True if the value of the first element in Target matches the value of the first element in Wordlist using RegExp.',
            ],
            'options' => [
                '@similar'  => 'Similar',
                '@contains' => 'Contains',
                '@match'    => 'Match',
                '@search'   => 'Search',
            ],
        ],
        'number' => [
            'helperText' => [
                '@equal'              => 'Target[Number] @ Value[Number]: True if the value of Target equals the value given.',
                '@greaterThan'        => 'Target[Number] @ Value[Number]: True if the value of Target greater than the value given.',
                '@lessThan'           => 'Target[Number] @ Value[Number]: True if the value of Target less than the value given.',
                '@greaterThanOrEqual' => 'Target[Number] @ Value[Number]: True if the value of Target greater than or equals the value given.',
                '@lessThanOrEqual'    => 'Target[Number] @ Value[Number]: True if the value of Target less than or equals the value given.',
                '@inRange'            => 'Target[Number] @ Value[RangeNumber]: True if the value of Target in the range given.',
            ],
            'options' => [
                '@equal'              => 'Equal',
                '@greaterThan'        => 'Greater Than',
                '@lessThan'           => 'Less Than',
                '@greaterThanOrEqual' => 'Greater Than or Equal',
                '@lessThanOrEqual'    => 'Less Than or Equal',
                '@inRange'            => 'In Range',
            ],
        ],
        'string' => [
            'helperText' => [
                '@mirror'      => 'Target[String] @ Value[String]: True if the value of Target is the same as the value given.',
                '@startsWith'  => 'Target[String] @ Value[String]: True if the value in Target starts with the value given.',
                '@endsWith'    => 'Target[String] @ Value[String]: True if the value in Target ends with the value given.',
                '@check'       => 'Target[String] @ Value[Wordlist]: True if the value in Target matches the value of the first element in Wordlist.',
                '@regExp'      => 'Target[String] @ Value[String]: True if the value of Target matches the value given using RegExp.',
                '@checkRegExp' => 'Target[String] @ Value[Wordlist]: True if the value in Target matches the value of the first element in Wordlist using RegExp.',
            ],
            'options' => [
                '@mirror'      => 'Mirror',
                '@startsWith'  => 'Starts With',
                '@endsWith'    => 'Ends With',
                '@check'       => 'Check',
                '@regExp'      => 'RegExp',
                '@checkRegExp' => 'Check RegExp',
            ],
        ],
    ];

    public static $conditions = [
        'number' => [
            '@equal',
            '@greaterThan',
            '@lessThan',
            '@greaterThanOrEqual',
            '@lessThanOrEqual',
        ],
        'range' => [
            '@inRange',
        ],
        'value' => [
            '@contains',
            '@match',
            '@mirror',
            '@startsWith',
            '@endsWith',
            '@regExp',
        ],
        'wordlist' => [
            '@similar',
            '@search',
            '@check',
            '@checkRegExp',
        ],
    ];
}
