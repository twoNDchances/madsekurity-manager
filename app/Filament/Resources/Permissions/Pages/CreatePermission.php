<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Components\Preparations\PermissionPreparation\CreatePermissionPreparation;
use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    use CreatePermissionPreparation;

    protected static string $resource = PermissionResource::class;
}
