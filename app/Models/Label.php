<?php

namespace App\Models;

use App\Observers\LabelObservers\LabelObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(LabelObserver::class)]
class Label extends Model
{
    protected $fillable = [
        'name',
        'color',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'name'        => 'string',
            'color'       => 'string',
            'description' => 'string',
            'user_id'     => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'labellable');
    }

    public function policies()
    {
        return $this->morphedByMany(Policy::class, 'labellable');
    }

    public function permissions()
    {
        return $this->morphedByMany(Permission::class, 'labellable');
    }

    public function settings()
    {
        return $this->morphedByMany(Setting::class, 'labellable');
    }

    public function variables()
    {
        return $this->morphedByMany(Variable::class, 'labellable');
    }
}
