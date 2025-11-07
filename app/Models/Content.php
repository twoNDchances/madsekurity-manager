<?php

namespace App\Models;

use App\Observers\ContentObservers\ContentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ContentObserver::class)]
class Content extends Model
{
    protected $fillable = [
        'name',
        'type',
        'raw',
        'length',
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
            'type'        => 'string',
            'raw'         => 'string',
            'length'      => 'integer',
            'description' => 'string',
            'user_id'     => 'integer',
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

    public function hasActions()
    {
        return $this->hasMany(Action::class, 'content_id');
    }
}
