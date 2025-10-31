<?php

namespace App\Models;

use App\Observers\VariableObservers\VariableObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(VariableObserver::class)]
class Variable extends Model
{
    protected $fillable = [
        'key',
        'value',
        'is_secret',
        'description',
        'setting_id',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id'          => 'integer',
            'key'         => 'string',
            'value'       => 'string',
            'is_secret'   => 'boolean',
            'description' => 'string',
            'setting_id'  => 'integer',
            'user_id'     => 'integer',
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labellable');
    }

    public function hasBehaviors()
    {
        return $this->morphMany(Behavior::class, 'resource');
    }
}
