<?php

namespace App\Schemas\Generals;

use DateTimeZone;

trait TimeZone
{
    public static function timezones()
    {
        $timezones = DateTimeZone::listIdentifiers();
        return collect($timezones)
        ->mapWithKeys(fn ($tz) => [$tz => $tz])
        ->toArray();
    }
}
