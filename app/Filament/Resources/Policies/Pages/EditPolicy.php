<?php

namespace App\Filament\Resources\Policies\Pages;

use App\Filament\Components\Preparations\PolicyPreparation\EditPreparation;
use App\Filament\Resources\Policies\PolicyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPolicy extends EditRecord
{
    use EditPreparation;

    protected static string $resource = PolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
