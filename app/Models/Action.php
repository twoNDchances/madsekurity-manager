<?php

namespace App\Models;

use App\Observers\ActionObservers\ActionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ActionObserver::class)]
class Action extends Model
{
    protected $fillable = [
        'name',
        'type',
        'configuration',
        'description',
        'content_id',
        'wordlist_id',
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
            'type'          => 'string',
            'configuration' => 'array',
            'description'   => 'string',
            'content_id'    => 'integer',
            'wordlist_id'   => 'integer',
            'user_id'       => 'integer',
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

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    public function wordlist()
    {
        return $this->belongsTo(Wordlist::class, 'wordlist_id');
    }

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'rules_actions');
    }
}
