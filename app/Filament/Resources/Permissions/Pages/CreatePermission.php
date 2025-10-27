<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Components\Preparations\PermissionPreparation\CreatePreparation;
use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    use CreatePreparation;

    protected static string $resource = PermissionResource::class;
}
