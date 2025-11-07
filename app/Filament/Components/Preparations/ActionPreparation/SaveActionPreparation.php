<?php

namespace App\Filament\Components\Preparations\ActionPreparation;

use Illuminate\Support\Str;

trait SaveActionPreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        $data['configuration'] = match ($data['type'])
        {
            'deny' => [
                'status'               => $data['deny_status'],
                'body_from_content_id' => $data['content_id'] ? true : false,
            ],
            'log' => [
                'format'     => match (Str::endsWith($data['log_format'], '\n'))
                {
                    true  => $data['log_format'],
                    false => $data['log_format'] . '\n',
                },
                'time_zone'  => $data['log_time_zone'],
                'to_console' => $data['log_to_console'],
                'to_file'    => $data['log_to_file'],
            ],
            'request' => [
                'url'                  => $data['request_url'],
                'method'               => $data['request_method'],
                'headers'              => $data['request_headers'],
                'body_from_content_id' => $data['content_id'] ? true : false,
                'certificate'          => $data['request_certificate'],
            ],
            'suspect' => [
                'severity' => $data['suspect_severity'],
            ],
            'setter' => [
                'variables' => $data['setter_variables'],
            ],
            'header' => [
                'directive'                => $data['header_directive'],
                'headers_from_wordlist_id' => $data['wordlist_id'] ? true : false,
                'modifications'            => isset($data['header_modifications']) ? $data['header_modifications'] : null,
            ],
            default => null,
        };
        return $data;
    }
}
