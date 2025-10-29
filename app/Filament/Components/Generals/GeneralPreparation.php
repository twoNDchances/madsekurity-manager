<?php

namespace App\Filament\Components\Generals;

trait GeneralPreparation
{
    use GeneralAction;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
