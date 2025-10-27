<?php

namespace App\Filament\Components\Generals;

trait GeneralPreparation
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
