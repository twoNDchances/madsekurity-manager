<?php

namespace App\Filament\Components\Preparations\ActionPreparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait EditActionPreparation
{
    use GeneralPreparation, SaveActionPreparation;

    protected function getHeaderActions(): array
    {
        return [
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $configration = $data['configuration'];
        switch ($data['type'])
        {
            case 'deny':
                $data['deny_status'] = $configration['status'];
                break;
            case 'log':
                $data['log_format']     = $configration['format'];
                $data['log_time_zone']  = $configration['time_zone'];
                $data['log_to_console'] = $configration['to_console'];
                $data['log_to_file']    = $configration['to_file'];
                break;
            case 'request':
                $data['request_url']         = $configration['url'];
                $data['request_method']      = $configration['method'];
                $data['request_headers']     = $configration['headers'];
                $data['request_certificate'] = $configration['certificate'];
                break;
            case 'suspect':
                $data['suspect_severity'] = $configration['severity'];
                break;
            case 'share':
                $data['share_directive'] = $configration['directive'];
                $data['share_variables'] = $configration['variables'];
                break;
            case 'header':
                $data['header_directive'] = $configration['directive'];
                $data['header_sets']      = $configration['sets'];
                break;
            case 'body':
                $data['body_directive'] = $configration['directive'];
                $data['body_sets']      = $configration['sets'];
                $data['body_unsets']    = $configration['unsets'];
                break;
            case 'score':
                $data['score_directive'] = $configration['directive'];
                $data['score_number']    = $configration['number'];
                $data['score_operator']  = $configration['operator'];
                break;
            default:
                break;
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
