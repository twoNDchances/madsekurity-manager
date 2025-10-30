<?php

namespace App\Models;

use App\Observers\WordlistObservers\WordlistObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(WordlistObserver::class)]
class Wordlist extends Model
{
    protected $fillable = [
        'name',
        'words_url',
        'words_count',
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
            'words_url'   => 'string',
            'words_count' => 'integer',
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
}
