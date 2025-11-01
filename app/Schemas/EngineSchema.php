<?php

namespace App\Schemas;

use App\Schemas\Generals\Datatype;

class EngineSchema
{
    use Datatype;

    public static $typesOfDatatypes = [
        'array' => [
            'indexOf' => 'Index Of ([...][i])',
        ],
        'number' => [
            'addition'       => 'Addition (+)',
            'subtraction'    => 'Subtraction (-)',
            'multiplication' => 'Multiplication (*)',
            'division'       => 'Division (/)',
            'powerOf'        => 'Power Of (^)',
            'remainder'      => 'Remainder (%)',
        ],
        'string' => [
            'lower'            => 'Lower ("abc def")',
            'upper'            => 'Upper ("ABC DEF")',
            'capitalize'       => 'Capitalize ("Abc Def")',
            'trim'             => 'Trim ("abc def")',
            'trimLeft'         => 'Trim Left ("abc def ")',
            'trimRight'        => 'Trim Right (" abc def")',
            'removeWhitespace' => 'Remove Whitespace ("abcdef")',
            'length'           => 'Length (7)',
            'hash'             => 'Hash ("e80b50...")',
        ],
    ];

    public static $hashes = [
        'md5'    => 'MD5',
        'sha1'   => 'SHA128',
        'sha256' => 'SHA256',
        'sha512' => 'SHA512',
    ];
}
