<?php

namespace App\Filament\Components\Forms\DefenderForm;

use App\Filament\Components\Actions\DefenderAction as Action;
use App\Filament\Components\Generals\GeneralAction;
use App\Services\DefenderService;
use Filament\Support\Icons\Heroicon;

trait DefenderAction
{
    use GeneralAction, Action;

    public static function applyAction()
    {
        return self::action(
            'apply_group',
            'Apply',
            Heroicon::OutlinedArrowUpOnSquareStack,
            function ($record, $livewire)
            {
                DefenderService::perform($livewire->getOwnerRecord(), 'apply', $record);
                $livewire->dispatch('refreshDefenderForm');
            },
        )
        ->authorize('apply')
        ->requiresConfirmation()
        ->color('sky');
    }

    public static function revokeAction()
    {
        return self::action(
            'revoke_group',
            'Revoke',
            Heroicon::OutlinedArrowUturnLeft,
            function ($record, $livewire)
            {

            },
        )
        ->authorize('revoke')
        ->requiresConfirmation()
        ->color('pink');
    }

    public static function bulkApplyAction()
    {
        return self::bulkAction(
            'bulk_apply_group',
            'Apply selected',
            Heroicon::OutlinedArrowUpOnSquareStack,
            function ($record, $livewires)
            {

            },
        )
        ->deselectRecordsAfterCompletion()
        ->authorize('applyAny')
        ->requiresConfirmation()
        ->color('sky');
    }

    public static function bulkRevokeAction()
    {
        return self::bulkAction(
            'bulk_revoke_group',
            'Revoke selected',
            Heroicon::OutlinedArrowUturnLeft,
            function ($record, $livewires)
            {

            },
        )
        ->deselectRecordsAfterCompletion()
        ->authorize('revokeAny')
        ->requiresConfirmation()
        ->color('pink');
    }
}
