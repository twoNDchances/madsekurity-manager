<?php

namespace App\Services;

use App\Models\Defender;
use App\Models\Group;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Nette\Utils\Json;

class DefenderService
{
    public static function perform(Defender $defender, $action, ?Group $group = null, $notification = true)
    {
        $body = null;
        switch ($action)
        {
            case 'apply':
                $body = $group;
                break;
            case 'revoke':
                break;
            case 'implement':
                break;
            case 'suspend':
                break;
            default:
                break;
        }
        $path     = "{$action}_path";
        $method   = "{$action}_method";
        $response = HttpRequestService::perform(
            "$defender->url/{$defender->$path}",
            $defender->$method,
            $body,
            $defender->username,
            $defender->password,
            $defender->certificate,
        );
        $data = null;
        try
        {
            if (\is_string($response))
            {
                $body = Json::encode(['status' => 500, 'from' => 'manager', 'message' => $response]);
                throw new Exception($body);
            }
            $status = $response->status();
            $data   = $response->body();
            if (!$response->successful())
            {
                $body = Json::encode(['status' => $status, 'from' => 'defender', 'message' => $data]);
                throw new Exception($body);
            }
            if ($notification)
            {
                NotificationService::perform('success', 'Success', $data);
            }
            self::log($defender, 'SUCCESS', $action, $status, $data);
            return $response->json();
        }
        catch (Exception $exception)
        {
            $data = $exception->getMessage();
            if ($notification)
            {
                NotificationService::perform('failure', 'Error', $data);
            }
            self::log($defender, 'FAILURE', $action, 500, $data);
        }
        return $data;
    }

    private static function log(Defender $defender, $status, $action, $code, $body)
    {
        $log      = $defender->log;
        $datetime = Carbon::now(Config::get('app.timezone', 'Asia/Ho_Chi_Minh'));
        $action   = Str::upper($action);
        $log     .= ($log ? "\n" : null) . "[$datetime] $status >> {{$action}} - $code - $body";
        $defender->update(['log' => $log]);
    }
}
