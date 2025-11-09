<?php

namespace App\Filament\Components\Tables\TargetTable;

use App\Filament\Components\Generals\GeneralAction;
use App\Services\NotificationService;
use Filament\Support\Icons\Heroicon;

trait TargetAction
{
    use GeneralAction;

    public static function bulkDeleteAction()
    {
        return self::bulkAction(
            'bulk_delete_target',
            'Delete selected',
            Heroicon::OutlinedTrash,
            function ($records)
            {
                $count = 0;
                foreach ($records as $record)
                {
                    if ($record->hasRules()->exists())
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
