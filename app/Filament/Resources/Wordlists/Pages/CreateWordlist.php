<?php

namespace App\Filament\Resources\Wordlists\Pages;

use App\Filament\Components\Preparations\WordlistPreparation\CreateWordlistPreparation;
use App\Filament\Resources\Wordlists\WordlistResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWordlist extends CreateRecord
{
    use CreateWordlistPreparation;

    protected static string $resource = WordlistResource::class;
}
