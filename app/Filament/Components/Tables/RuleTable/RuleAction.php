<?php

namespace App\Filament\Components\Tables\RuleTable;

use App\Filament\Components\Generals\GeneralAction;
use App\Services\NotificationService;
use Filament\Support\Icons\Heroicon;

trait RuleAction
{
    use GeneralAction;

    public static function bulkDeleteAction()
    {
        return self::bulkAction(
            'bulk_delete_rule',
            'Delete selected',
            Heroicon::OutlinedTrash,
            function ($records)
            {
                $count = 0;
                foreach ($records as $record)
                {
                    if ($record->groups()->exists())
                    {
                        continue;
                    }
                    $record->delete();
                    $count++;
                }
                if (!$count)
                {
                    NotificationService::notify('failure', "Deleted $count record(s)");
                    return;
                }
                NotificationService::notify('success', "Deleted $count record(s)");
            },
        )
        ->deselectRecordsAfterCompletion()
        ->requiresConfirmation()
        ->color('danger');
    }
}
