<?php

namespace App\Models;

use App\Observers\TargetObservers\TargetObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(TargetObserver::class)]
class Target extends Model
{
    protected $fillable = [
        'name',
        'phase',
        'type',
        'datatype',
        'description',
        'context_id',
        'target_id',
        'wordlist_id',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
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
            'context_id'  => 'integer',
            'wordlist_id' => 'integer',
            'user_id'     => 'integer',
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
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

    public function target()
    {
        return $this->belongsTo($this::class, 'target_id');
    }

    public function hasTargets()
    {
        return $this->hasMany($this::class, 'target_id');
    }

    public function wordlist()
    {
        return $this->belongsTo(Wordlist::class, 'wordlist_id');
    }

    public function engines()
    {
        return $this->belongsToMany(Engine::class, 'targets_engines')
        ->withPivot('order')
        ->orderBy('order');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'context_id');
    }
}
