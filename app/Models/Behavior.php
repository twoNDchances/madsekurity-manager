<?php

namespace App\Models;

use App\Observers\BehaviorObservers\BehaviorObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(BehaviorObserver::class)]
class Behavior extends Model
{
    protected $fillable = [
        'address',
        'method',
        'headers',
        'body',
        'route',
        'action',
        'resource_id',
        'resource_type',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'address'       => 'string',
            'method'        => 'string',
            'headers'       => 'string',
            'body'          => 'string',
            'route'         => 'string',
            'action'        => 'string',
            'resource_id'   => 'integer',
            'resource_type' => 'string',
            'user_id'       => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function resource()
    {
        return $this->morphTo();
    }
}
