<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Components\Preparations\UserPreparation\CreatePreparation;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    use CreatePreparation;

    protected static string $resource = UserResource::class;
}
