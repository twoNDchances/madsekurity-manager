<?php

namespace App\Filament\Components\Forms\ActionForm;

use App\Filament\Components\Generals\GeneralAction;

trait ActionAction
{
    use GeneralAction;

    public static function requestTest()
    {
        return self::action(
            'request_test',
            
        );
    }
}
