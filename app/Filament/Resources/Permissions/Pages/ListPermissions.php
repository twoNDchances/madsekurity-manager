<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Components\Preparations\PermissionPreparation\ListPermissionPreparation;
use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    use ListPermissionPreparation;

    protected static string $resource = PermissionResource::class;
}
