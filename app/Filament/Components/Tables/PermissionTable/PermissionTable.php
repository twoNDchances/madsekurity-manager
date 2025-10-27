<?php

namespace App\Filament\Components\Tables\PermissionTable;

use App\Filament\Components\Generals\GeneralTable;
use Illuminate\Support\Str;

trait PermissionTable
{
    use GeneralTable, PermissionAction;

    public static function name()
    {
        return self::textColumn('name');
    }

    public static function type($name)
    {
        $number = match ($name)
        {
            'resource' => 0,
            'action'   => 1,
        };
        return self::textColumn($name)
        ->getStateUsing(fn ($record) => Str::title(explode('.', $record->action)[$number]));
    }

    public static function policies()
    {
        return self::relationshipColumn('policies.name', 'Policies');
    }
}
