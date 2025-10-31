<?php

namespace App\Services;

use App\Models\Setting;

class ConfigurationService
{
    public static function getSetting($name)
    {
        return Setting::firstWhere('name', $name);
    }

    public static function getVariable($settingName, $variableKey, $default = null)
    {
        $setting = self::getSetting($settingName);
        if (!$setting)
        {
            return $default;
        }

        $variable = $setting->hasVariables()->firstWhere('key', $variableKey);
        return match ($variable)
        {
            null    => $default,
            default => $variable,
        };
    }
}
