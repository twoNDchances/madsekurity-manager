<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Components\Preparations\PermissionPreparation\EditPermissionPreparation;
use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    use EditPermissionPreparation;

    protected static string $resource = PermissionResource::class;
}
