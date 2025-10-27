<?php

namespace App\Filament\Components\Generals;

use Filament\Actions;

trait GeneralAction
{
    public static function action(string $name, $label = null, $icon = null, $action = null)
    {
        return Actions\Action::make($name)
        ->label($label)
        ->icon($icon)
        ->action($action);
    }

    public static function actionGroup($view = true, $edit = true, $delete = true, $more = [])
    {
        $actionGroup = [];
        if ($view)
        {
            $actionGroup[] = Actions\ViewAction::make();
        }
        if ($edit)
        {
            $actionGroup[] = Actions\EditAction::make();
        }
        if (count($more) > 0)
        {
            foreach ($more as $action)
            {
                $actionGroup[] = $action;
            }
        }
        if ($delete)
        {
            $actionGroup[] = Actions\DeleteAction::make();
        }
        return Actions\ActionGroup::make($actionGroup);
    }

    public static function bulkAction(string $name, $label = null, $icon = null, $action = null)
    {
        return Actions\BulkAction::make($name)
        ->label($label)
        ->icon($icon)
        ->action($action);
    }

    public static function bulkActionGroup($delete = true, $more = [])
    {
        $bulkActionGroup = [];
        if (count($more) > 0)
        {
            foreach ($more as $bulkAction)
            {
                $bulkActionGroup[] = $bulkAction;
            }
        }
        if ($delete)
        {
            $bulkActionGroup[] = Actions\DeleteBulkAction::make();
        }
        return Actions\BulkActionGroup::make($bulkActionGroup);
    }
}
