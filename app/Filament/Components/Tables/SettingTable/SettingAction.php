<?php

namespace App\Filament\Components\Tables\SettingTable;

use App\Filament\Components\Generals\GeneralAction;
use App\Models\Setting;
use App\Models\Variable;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Carbon;

trait SettingAction
{
    use GeneralAction {
        actionGroup as generalActionGroup;
    }

    public static function cloneSetting()
    {
        return self::action(
            'clone_setting',
            'Clone',
            Heroicon::OutlinedDocumentDuplicate,
            function ($record)
            {
                $setting = Setting::create(['name' => $record->name . '-' . Carbon::now()->timestamp]);
                $variables = $record->hasVariables->all();
                foreach ($variables as $variable)
                {
                    $variable->setting_id = $setting->id;
                    Variable::create($variable->toArray());
                }
            },
        )
        ->color('teal');
    }

    public static function actionGroup($view = true, $edit = true, $delete = true, $more = [])
    {
        return self::generalActionGroup($view, $edit, $delete, [self::cloneSetting(), ...$more]);
    }
}
