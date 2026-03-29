<?php

namespace App\Filament\Components\Preparations\DefenderPreparation;

use App\Filament\Components\Forms\DefenderForm\DefenderAction;
use App\Filament\Components\Generals\GeneralPreparation;

trait EditDefenderPreparation
{
    use GeneralPreparation, SaveDefenderPreparation, DefenderAction;

    protected function getHeaderActions(): array
    {
        return [
            self::healthAction(),
            self::inspectAction(),
            self::clearAction(),
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }

    public function reloadForm(): void
    {
        $this->mutateFormDataBeforeFill($this->data);
        $this->fillForm();
    }
}
