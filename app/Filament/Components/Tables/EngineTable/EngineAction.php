<?php

namespace App\Filament\Components\Tables\EngineTable;

use App\Filament\Components\Generals\GeneralAction;
use App\Services\NotificationService;
use Filament\Support\Icons\Heroicon;

trait EngineAction
{
    use GeneralAction;

    public static function bulkDeleteAction()
    {
        return self::bulkAction(
            'bulk_delete_engine',
            'Delete selected',
            Heroicon::OutlinedTrash,
            function ($records)
            {
                $count = 0;
                foreach ($records as $record)
                {
                    if ($record->targets()->exists())
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
