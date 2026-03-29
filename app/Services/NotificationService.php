<?php

namespace App\Services;

use Filament\Notifications\Notification;

class NotificationService
{
    public static function perform($status, $title, $body = null)
    {
        $notification = Notification::make()->title($title)->body($body);
        $notification = match ($status)
        {
            'success' => $notification->success(),
            'failure' => $notification->danger(),
            'warning' => $notification->warning(),
            default   => $notification->info(),
        };
        return $notification->send();
    }
}
