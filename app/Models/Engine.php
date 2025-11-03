<?php

namespace App\Models;

use App\Observers\EngineObservers\EngineObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(EngineObserver::class)]
class Engine extends Model
{
    protected $fillable = [
        'name',
        'type',
        'configuration',
        'input_datatype',
        'output_datatype',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id'              => 'integer',
            'name'            => 'string',
            'type'            => 'string',
            'configuration'   => 'array',
            'input_datatype'  => 'string',
            'output_datatype' => 'string',
            'description'     => 'string',
            'user_id'         => 'integer',
            'created_at'      => 'datetime',
            'updated_at'      => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labellable');
    }

    public function hasBehaviors()
    {
        return $this->morphMany(Behavior::class, 'resource');
    }

    public function targets()
    {
        return $this->belongsToMany(Target::class, 'targets_engines')
        ->withPivot('order')
        ->orderBy('order');
    }
}
