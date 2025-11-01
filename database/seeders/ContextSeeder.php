<?php

namespace Database\Seeders;

use App\Models\Context;
use Illuminate\Database\Seeder;

class ContextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contexts = [
            [
                'name'        => 'request-full',
                'type'        => 'full',
                'phase'       => 0,
                'datatype'    => 'string',
                'description' => 'Include Headers & Body of Request',
            ],
            // ========================= //
            // ========================= //
            [
                'name'        => 'request-header-keys',
                'type'        => 'header',
                'phase'       => 1,
                'datatype'    => 'array',
                'description' => 'Header keys of Request',
            ],
            [
                'name'        => 'request-header-values',
                'type'        => 'header',
                'phase'       => 1,
                'datatype'    => 'array',
                'description' => 'Header values of Request',
            ],
            [
                'name'        => 'request-query-keys',
                'type'        => 'query',
                'phase'       => 1,
                'datatype'    => 'array',
                'description' => 'Query key of Request',
            ],
            [
                'name'        => 'request-query-values',
                'type'        => 'query',
                'phase'       => 1,
                'datatype'    => 'array',
                'description' => 'Query values of Request',
            ],
            // ========================= //
            [
                'name'        => 'request-header-size',
                'type'        => 'header',
                'phase'       => 1,
                'datatype'    => 'number',
                'description' => 'Header field number of Request',
            ],
            [
                'name'        => 'request-meta-url-port',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'number',
                'description' => 'URL Port of Request',
            ],
            [
                'name'        => 'request-query-size',
                'type'        => 'query',
                'phase'       => 1,
                'datatype'    => 'number',
                'description' => 'Query field number of Request',
            ],
            // ========================= //
            [
                'name'        => 'request-meta-protocol',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'Protocol of Request',
            ],
            [
                'name'        => 'request-meta-ip',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'IP of Request',
            ],
            [
                'name'        => 'request-meta-method',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'Method of Request',
            ],
            [
                'name'        => 'request-meta-url-path',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'URL Path of Request',
            ],
            [
                'name'        => 'request-meta-url-scheme',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'URL Scheme of Request',
            ],
            [
                'name'        => 'request-meta-url-host',
                'type'        => 'meta',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'URL Host of Request',
            ],
            [
                'name'        => 'request-full-headers',
                'type'        => 'full',
                'phase'       => 1,
                'datatype'    => 'string',
                'description' => 'Headers of Request',
            ],
            // ========================= //
            // ========================= //
            [
                'name'        => 'request-body-keys',
                'type'        => 'body',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'Body keys of Request',
            ],
            [
                'name'        => 'request-file-keys',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'File keys of Request',
            ],
            [
                'name'        => 'request-body-values',
                'type'        => 'body',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'Body values of Request',
            ],
            [
                'name'        => 'request-file-values',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'File values of Request',
            ],
            [
                'name'        => 'request-file-names',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'File names of Request',
            ],
            [
                'name'        => 'request-file-extensions',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'array',
                'description' => 'File extensions of Request',
            ],
            // ========================= //
            [
                'name'        => 'request-body-size',
                'type'        => 'body',
                'phase'       => 2,
                'datatype'    => 'number',
                'description' => 'Body field number of Request',
            ],
            [
                'name'        => 'request-file-size',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'number',
                'description' => 'File field number of Request',
            ],
            [
                'name'        => 'request-file-name-size',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'number',
                'description' => 'File name number of Request',
            ],
            [
                'name'        => 'request-body-length',
                'type'        => 'body',
                'phase'       => 2,
                'datatype'    => 'number',
                'description' => 'Body length of Request',
            ],
            [
                'name'        => 'request-file-length',
                'type'        => 'file',
                'phase'       => 2,
                'datatype'    => 'number',
                'description' => 'File length of Request',
            ],
            // ========================= //
            [
                'name'        => 'request-full-body',
                'type'        => 'full',
                'phase'       => 2,
                'datatype'    => 'string',
                'description' => 'Body of Request',
            ],
            // ========================= //
            // ========================= //
            [
                'name'        => 'response-header-keys',
                'type'        => 'header',
                'phase'       => 3,
                'datatype'    => 'array',
                'description' => 'Header keys of Response',
            ],
            [
                'name'        => 'response-header-values',
                'type'        => 'header',
                'phase'       => 3,
                'datatype'    => 'array',
                'description' => 'Header values of Response',
            ],
            // ========================= //
            [
                'name'        => 'response-header-size',
                'type'        => 'header',
                'phase'       => 3,
                'datatype'    => 'number',
                'description' => 'Header field number of Response',
            ],
            [
                'name'        => 'response-meta-status',
                'type'        => 'meta',
                'phase'       => 3,
                'datatype'    => 'number',
                'description' => 'Status of Response',
            ],
            // ========================= //
            [
                'name'        => 'response-meta-protocol',
                'type'        => 'meta',
                'phase'       => 3,
                'datatype'    => 'string',
                'description' => 'Protocol of Response',
            ],
            [
                'name'        => 'response-full-headers',
                'type'        => 'full',
                'phase'       => 3,
                'datatype'    => 'string',
                'description' => 'Headers of Response',
            ],
            // ========================= //
            // ========================= //
            [
                'name'        => 'response-body-keys',
                'type'        => 'body',
                'phase'       => 4,
                'datatype'    => 'array',
                'description' => 'Body keys of Response',
            ],
            [
                'name'        => 'response-body-values',
                'type'        => 'body',
                'phase'       => 4,
                'datatype'    => 'array',
                'description' => 'Body values of Response',
            ],
            // ========================= //
            [
                'name'        => 'response-body-size',
                'type'        => 'body',
                'phase'       => 4,
                'datatype'    => 'number',
                'description' => 'Body field number of Response',
            ],
            [
                'name'        => 'response-body-length',
                'type'        => 'body',
                'phase'       => 4,
                'datatype'    => 'number',
                'description' => 'Body length of Response',
            ],
            // ========================= //
            [
                'name'        => 'response-full-body',
                'type'        => 'full',
                'phase'       => 4,
                'datatype'    => 'string',
                'description' => 'Body of Response',
            ],
            // ========================= //
            // ========================= //
            [
                'name'        => 'response-full',
                'type'        => 'full',
                'phase'       => 5,
                'datatype'    => 'string',
                'description' => 'Include Headers & Body of Response',
            ],
        ];


        foreach ($contexts as $context)
        {
            Context::firstOrCreate(['name' => $context['name']], $context);
        }
    }
}
