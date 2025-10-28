<?php

namespace App\Models;

use App\Observers\SettingObservers\SettingObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(SettingObserver::class)]
class Setting extends Model
{
    protected $fillable = [
        'name',
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
            'description' => 'string',
            'user_id'     => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasVariables()
    {
        return $this->hasMany(Variable::class, 'setting_id');
    }
}
