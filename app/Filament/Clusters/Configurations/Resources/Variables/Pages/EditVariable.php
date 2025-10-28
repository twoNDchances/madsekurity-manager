<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Filament\Components\Preparations\VariablePreparation\EditPreparation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVariable extends EditRecord
{
    use EditPreparation;

    protected static string $resource = VariableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
