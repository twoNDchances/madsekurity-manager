<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'name',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'id'          => 'integer',
            'key'         => 'string',
            'value'       => 'string',
            'name'        => 'string',
            'description' => 'string',
        ];
    }
}
