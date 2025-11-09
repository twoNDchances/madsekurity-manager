<?php

namespace App\Filament\Components\Preparations\RulePreparation;

use App\Schemas\RuleSchema;

trait SaveRulePreparation
{
    public static function mutateFormDataBefore(array $data): array
    {
        foreach (array_keys(RuleSchema::$conditions) as $name)
        {
            if (in_array($data['comparator'], RuleSchema::$conditions[$name]))
            {
                $condition = $name;
            }
        }
        $data['configuration'] = match ($condition)
        {
            'number' => ['number' => $data['number']],
            'range'  => [
                'number' => [
                    'from' => $data['range_from'],
                    'to'   => $data['range_to'],
                ],
            ],
            'value'    => ['value' => $data['value']],
            'wordlist' => [
                'value' => [
                    'from_wordlist_id' => true,
                ],
            ],
        };
        return $data;
    }
}
