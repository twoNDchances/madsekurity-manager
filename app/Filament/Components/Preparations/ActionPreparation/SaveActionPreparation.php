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
            'share' => [
                'directive'             => $data['share_directive'],
                'keys_from_wordlist_id' => isset($data['wordlist_id']) ? true : false,
                'variables'             => isset($data['share_variables']) ? $data['share_variables'] : null,
            ],
            'header' => [
                'directive'             => $data['header_directive'],
                'keys_from_wordlist_id' => isset($data['wordlist_id']) ? true : false,
                'sets'                  => isset($data['header_sets']) ? $data['header_sets'] : null,
            ],
            'body' => [
                'directive' => $data['body_directive'],
                'sets'      => isset($data['body_sets']) ? $data['body_sets'] : null,
                'unsets'    => isset($data['body_unsets']) ? $data['body_unsets'] : null,
            ],
            'score' => [
                'directive' => $data['score_directive'],
                'number'    => $data['score_number'],
                'operator'  => isset($data['score_operator']) ? $data['score_operator'] : null,
            ],
            default => null,
        };
        return $data;
    }
}
