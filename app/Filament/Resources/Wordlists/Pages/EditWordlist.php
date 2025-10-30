<?php

namespace App\Filament\Resources\Wordlists\Pages;

use App\Filament\Components\Preparations\WordlistPreparation\EditWordlistPreparation;
use App\Filament\Resources\Wordlists\WordlistResource;
use Filament\Resources\Pages\EditRecord;

class EditWordlist extends EditRecord
{
    use EditWordlistPreparation;

    protected static string $resource = WordlistResource::class;
}
