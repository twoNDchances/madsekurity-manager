<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Components\Preparations\UserPreparation\CreateUserPreparation;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    use CreateUserPreparation;

    protected static string $resource = UserResource::class;
}
