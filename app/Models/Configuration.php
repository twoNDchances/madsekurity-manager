<?php

namespace App\Models;

use App\Observers\ConfigurationObservers\ConfigurationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ConfigurationObserver::class)]
class Configuration extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'name'    => 'string',
            'user_id' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasSettings()
    {
        return $this->hasMany(Setting::class, 'configuration_id');
    }
}
