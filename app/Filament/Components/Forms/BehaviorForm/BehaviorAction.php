<?php

namespace App\Filament\Components\Forms\BehaviorForm;

use App\Filament\Components\Generals\GeneralAction;
use Filament\Support\Icons\Heroicon;
use Webbingbrasil\FilamentCopyActions\Actions\CopyAction;

trait BehaviorAction
{
    use GeneralAction;

    public static function openResourceUrl()
    {
        return self::action('open_resource_url', 'Open Resource URL', Heroicon::OutlinedArrowTopRightOnSquare)
        ->url(fn ($state) => $state)
        ->openUrlInNewTab();
    }

    public static function copyResourceUrl()
    {
        return CopyAction::make();
    }
}
