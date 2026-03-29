<?php

namespace App\Models;

use App\Observers\DefenderObservers\DefenderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(DefenderObserver::class)]
class Defender extends Model
{
    protected $fillable = [
        'name',
        'url',
        'is_important',
        'status',
        'health_method',
        'health_path',
        'inspect_method',
        'inspect_path',
        'apply_method',
        'apply_path',
        'revoke_method',
        'revoke_path',
        'implement_method',
        'implement_path',
        'suspend_method',
        'suspend_path',
        'certificate',
        'log',
        'username',
        'password',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts()
    {
        return [
            'id'               => 'integer',
            'name'             => 'string',
            'url'              => 'string',
            'is_important'     => 'boolean',
            'status'           => 'boolean',
            'health_method'    => 'string',
            'health_path'      => 'string',
            'inspect_method'   => 'string',
            'inspect_path'     => 'string',
            'apply_method'     => 'string',
            'apply_path'       => 'string',
            'revoke_method'    => 'string',
            'revoke_path'      => 'string',
            'implement_method' => 'string',
            'implement_path'   => 'string',
            'suspend_method'   => 'string',
            'suspend_path'     => 'string',
            'certificate'      => 'string',
            'log'              => 'string',
            'username'         => 'string',
            'password'         => 'string',
            'description'      => 'string',
            'user_id'          => 'integer',
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

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'defenders_groups')
        ->withPivot('order')
        ->orderBy('order');
    }
}
