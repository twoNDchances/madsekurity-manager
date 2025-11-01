<?php

namespace App\Schemas;

use App\Schemas\Generals\Method;

class BehaviorSchema
{
    use Method;

    public static $actions = [
        'colors' => [
            'Create' => 'success',
            'Update' => 'info',
            'Delete' => 'danger',
        ],
        'options' => [
            'Create' => 'Create',
            'Update' => 'Update',
            'Delete' => 'Delete',
        ],
    ];
}
