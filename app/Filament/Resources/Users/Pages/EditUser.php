<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Components\Preparations\UserPreparation\EditUserPreparation;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    use EditUserPreparation;

    protected static string $resource = UserResource::class;
}
