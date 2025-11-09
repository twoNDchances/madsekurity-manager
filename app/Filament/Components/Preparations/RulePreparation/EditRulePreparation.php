<?php

namespace App\Filament\Components\Preparations\RulePreparation;

use App\Filament\Components\Generals\GeneralPreparation;
use App\Schemas\RuleSchema;

trait EditRulePreparation
{
    use GeneralPreparation, SaveRulePreparation;

    protected function getHeaderActions(): array
    {
        return [
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        foreach (array_keys(RuleSchema::$conditions) as $name)
        {
            if (in_array($data['comparator'], RuleSchema::$conditions[$name]))
            {
                $condition = $name;
            }
        }
        $configuration = $data['configuration'];
        switch ($condition)
        {
            case 'number':
                $data['number'] = $configuration['number'];
                break;
            case 'range':
                $data['range_from'] = $configuration['number']['from'];
                $data['range_to']   = $configuration['number']['to'];
                break;
            case 'value':
                $data['value'] = $configuration['value'];
                break;
            default:
                break;
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBefore($data);
    }
}
