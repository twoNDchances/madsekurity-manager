<?php

namespace App\Models;

use App\Observers\GroupObservers\GroupObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(GroupObserver::class)]
class Group extends Model
{
    protected $fillable = [
        'name',
        'level',
        'phase',
        'description',
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
            'level'       => 'integer',
            'phase'       => 'integer',
            'description' => 'string',
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

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'groups_rules')
        ->withPivot('order')
        ->orderBy('order');
    }
}
