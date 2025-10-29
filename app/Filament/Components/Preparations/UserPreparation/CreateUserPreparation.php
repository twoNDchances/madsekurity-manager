<?php

namespace App\Filament\Components\Preparations\UserPreparation;

use App\Filament\Components\Generals\GeneralPreparation;
use Illuminate\Support\Carbon;

trait CreateUserPreparation
{
    use GeneralPreparation;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['must_verify']) && $data['must_verify'] == false)
        {
            $data['email_verified_at'] = Carbon::now();
        }
        return $data;
    }
}
