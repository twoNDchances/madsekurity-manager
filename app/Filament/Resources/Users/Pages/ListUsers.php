<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Components\Preparations\UserPreparation\ListUserPreparation;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    use ListUserPreparation;

    protected static string $resource = UserResource::class;
}
