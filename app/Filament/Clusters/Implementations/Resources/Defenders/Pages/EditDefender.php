<?php

namespace App\Filament\Clusters\Implementations\Resources\Defenders\Pages;

use App\Filament\Clusters\Implementations\Resources\Defenders\DefenderResource;
use App\Filament\Components\Preparations\DefenderPreparation\EditDefenderPreparation;
use Filament\Resources\Pages\EditRecord;

class EditDefender extends EditRecord
{
    use EditDefenderPreparation;

    protected $listeners = ['refreshDefenderForm' => 'reloadForm'];

    protected static string $resource = DefenderResource::class;
}
