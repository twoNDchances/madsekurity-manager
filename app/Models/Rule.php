<?php

namespace App\Models;

use App\Observers\RuleObservers\RuleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(RuleObserver::class)]
class Rule extends Model
{
    protected $fillable = [
        'name',
        'phase',
        'target_id',
        'comparator',
        'is_inverse',
        'configuration',
        'wordlist_id',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id'            => 'integer',
            'name'          => 'string',
            'target_id'     => 'integer',
            'comparator'    => 'string',
            'is_inverse'    => 'boolean',
            'configuration' => 'array',
            'wordlist_id'   => 'integer',
            'description'   => 'string',
            'user_id'       => 'integer',
            'created_at'    => 'datetime',
            'updated_at'    => 'datetime',
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

    public function wordlist()
    {
        return $this->belongsTo(Wordlist::class, 'wordlist_id');
    }

    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'rules_actions')
        ->withPivot('order')
        ->orderBy('order');
    }
}
