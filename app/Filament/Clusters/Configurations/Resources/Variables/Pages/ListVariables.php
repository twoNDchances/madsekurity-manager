<?php

namespace App\Filament\Clusters\Configurations\Resources\Variables\Pages;

use App\Filament\Clusters\Configurations\Resources\Variables\VariableResource;
use App\Models\Setting;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListVariables extends ListRecords
{
    protected static string $resource = VariableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting)
        {
            $data[$setting->name] = Tab::make()
            ->modifyQueryUsing(fn ($query) => $query->where('setting_id', $setting->id));
        }
        return $data;
    }
}
