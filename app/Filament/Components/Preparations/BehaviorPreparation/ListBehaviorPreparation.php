<?php

namespace App\Filament\Components\Preparations\BehaviorPreparation;

use App\Filament\Components\Generals\GeneralAction;
use App\Models\User;
use Filament\Schemas\Components\Tabs\Tab;

trait ListBehaviorPreparation
{
    use GeneralAction;

    protected function getHeaderActions(): array
    {
        return [
            self::createAction(),
        ];
    }

    public function getTabs(): array
    {
        $users = User::all();
        $data  = [];
        foreach ($users as $user)
        {
            $data[$user->email] = Tab::make()
            ->modifyQueryUsing(fn ($query) => $query->where('user_id', $user->id))
            ->label($user->email);
        }
        return $data;
    }
}
