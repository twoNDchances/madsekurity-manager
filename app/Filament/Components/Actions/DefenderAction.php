<?php

namespace App\Filament\Components\Actions;

use App\Filament\Components\Generals\GeneralAction;
use App\Services\DefenderService;
use App\Services\NotificationService;
use Filament\Support\Icons\Heroicon;

trait DefenderAction
{
    use GeneralAction;

    public static function healthAction()
    {
        return self::action(
            'health_defender',
            'Health',
            Heroicon::OutlinedQuestionMarkCircle,
            function ($record, $livewire)
            {
                DefenderService::perform($record, 'health');
                $livewire->dispatch('refreshDefenderForm');
            },
        )
        ->authorize('health')
        ->color('slate');
    }

    public static function inspectAction()
    {
        return self::action('inspect_defender', 'Inspect', Heroicon::OutlinedBugAnt)
        ->url(fn ($record) => route('manager.defenders.inspect', ['id' => $record->id]))
        ->authorize('inspect')
        ->color('primary')
        ->openUrlInNewTab();
    }

    public static function clearAction()
    {
        return self::action(
            'clear_log_defender',
            'Clear',
            Heroicon::OutlinedBackspace,
            function ($record, $livewire)
            {
                $record->update(['log' => null]);
                $livewire->dispatch('refreshDefenderForm');
                NotificationService::perform('success', 'Cleared');
            },
        )
        ->authorize('clearLog')
        ->requiresConfirmation()
        ->color('danger');
    }
}
