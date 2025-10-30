<?php

namespace App\Filament\Components\Preparations\VariablePreparation;

use App\Filament\Components\Generals\GeneralAction;
use App\Models\Setting;
use Filament\Schemas\Components\Tabs\Tab;

trait ListVariablePreparation
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
        $settings = Setting::all();
        $data     = [];
        foreach ($settings as $setting)
        {
            $data[$setting->name] = Tab::make()
            ->modifyQueryUsing(fn ($query) => $query->where('setting_id', $setting->id))
            ->label($setting->name);
        }
        return $data;
    }
}
