<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    protected $fillable = [
        'name',
        'phase',
        'type',
        'datatype',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'id'          => 'integer',
            'name'        => 'string',
            'phase'       => 'integer',
            'type'        => 'string',
            'datatype'    => 'string',
            'description' => 'string',
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
        ];
    }

    public function hasTargets()
    {
        return $this->hasMany(Target::class, 'context_id');
    }
}
