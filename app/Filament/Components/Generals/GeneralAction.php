<?php

namespace App\Filament\Components\Generals;

use Filament\Actions;
use Filament\Support\Icons\Heroicon;

trait GeneralAction
{
    public static function createAction()
    {
        return Actions\CreateAction::make()->icon(fn () => Heroicon::OutlinedPlus);
    }

    public static function attachAction()
    {
        return Actions\AttachAction::make()->icon(fn () => Heroicon::OutlinedLink);
    }

    public static function viewAction()
    {
        return Actions\ViewAction::make()->icon(fn () => Heroicon::OutlinedEye);
    }

    public static function editAction()
    {
        return Actions\EditAction::make()->icon(fn () => Heroicon::OutlinedPencilSquare);
    }

    public static function detachAction()
    {
        return Actions\DetachAction::make()->icon(fn () => Heroicon::OutlinedXMark);
    }

    public static function deleteAction()
    {
        return Actions\DeleteAction::make()->icon(fn () => Heroicon::OutlinedTrash);
    }

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
            $actionGroup[] = self::viewAction();
        }
        if ($edit)
        {
            $actionGroup[] = self::editAction();
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
            $actionGroup[] = self::deleteAction();
        }
        return Actions\ActionGroup::make($actionGroup);
    }

    public static function relationManagerHeaderActionGroup($create = true, $attach = true)
    {
        $headerActionGroup = [];
        if ($create)
        {
            $headerActionGroup[] = self::createAction();
        }
        if ($attach)
        {
            $headerActionGroup[] = self::attachAction();
        }
        return Actions\ActionGroup::make($headerActionGroup);
    }

    public static function relationManagerRecordActionGroup($view = true, $edit = true, $detach = true, $delete = true, $more = [])
    {
        if ($detach)
        {
            $more[] = self::detachAction();
        }
        return self::actionGroup($view, $edit, $delete, $more);
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

    public static function relationManagerToolbarActionGroup($detach = true, $delete = true, $more = [])
    {
        if ($detach)
        {
            $more[] = Actions\DetachBulkAction::make();
        }
        return self::bulkActionGroup($delete, $more);
    }
}
