<?php

namespace App\Filament\Components\Tables\UserTable;

use App\Filament\Components\Generals\GeneralAction;
use App\Services\IdentificationService;
use App\Services\NotificationService;
use Filament\Support\Icons\Heroicon;

trait UserAction
{
    use GeneralAction;

    public static function deleteBulkAction()
    {
        return self::bulkAction(
            'bulk_delete_user',
            'Delete selected',
            Heroicon::OutlinedTrash,
            function ($records)
            {
                $count = 0;
                foreach ($records as $record)
                {
                    if ($record->id == IdentificationService::getId())
                    {
                        continue;
                    }
                    if ($record->is_important && !IdentificationService::isImportant())
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
