<?php

namespace App\Services;

use App\Models\User;
use Filament\Notifications\Notification;

class NotificationService
{
    private static function build($status, $title, $body = null)
    {
        $notification = Notification::make()->title($title)->body($body);
        $notification = match ($status)
        {
            'success' => $notification->success(),
            'failure' => $notification->danger(),
            'warning' => $notification->warning(),
            default   => $notification->info(),
        };
        return $notification;
    }

    public static function notify($status, $title, $body = null)
    {
        return self::build($status, $title, $body)->send();
    }

    public static function announce($status, $title, $body = null, $all = false, $immediately = false)
    {
        $builder = self::build($status, $title, $body);
        if ($all)
        {
            $users = User::all();
            foreach ($users as $user)
            {
                $builder->sendToDatabase($user, $immediately);
            }
        }
        else
        {
            $user = IdentificationService::getUser();
            $builder->sendToDatabase($user, $immediately);
        }
        return $builder;
    }
}
