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
        'words_type',
        'words_file',
        'words_text',
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
            'id'          => 'integer',
            'name'        => 'string',
            'words_type'  => 'string',
            'words_text'  => 'string',
            'words_file'  => 'string',
            'words_count' => 'integer',
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

    public function hasTargets()
    {
        return $this->hasMany(Target::class, 'wordlist_id');
    }
}
