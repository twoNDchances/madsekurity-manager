<?php

namespace App\Filament\Resources\Wordlists\Pages;

use App\Filament\Components\Preparations\WordlistPreparation\ListWordlistPreparation;
use App\Filament\Resources\Wordlists\WordlistResource;
use Filament\Resources\Pages\ListRecords;

class ListWordlists extends ListRecords
{
    use ListWordlistPreparation;

    protected static string $resource = WordlistResource::class;
}
