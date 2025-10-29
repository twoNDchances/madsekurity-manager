<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Observers\UserObservers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ObservedBy(UserObserver::class)]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_important',
        'can_login',
        'email_verified_at',
        'token',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_id',
        'token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'name'              => 'string',
            'email'             => 'string',
            'is_important'      => 'boolean',
            'can_login'         => 'boolean',
            'token'             => 'string',
            'user_id'           => 'integer',
        ];
    }

    public function hasPermission(string $action): bool
    {
        if ($this->policies()->count() == 0)
        {
            return false;
        }
        $hasAnyPermission = $this->policies()->whereHas('permissions')->exists();
        if (!$hasAnyPermission)
        {
            return false;
        }
        return $this
        ->policies()
        ->whereHas(
            'permissions',
            function ($query) use ($action)
            {
                $query->where('action', $action);
            },
        )
        ->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasUsers()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function policies()
    {
        return $this->belongsToMany(Policy::class, 'users_policies');
    }

    public function hasPolicies()
    {
        return $this->hasMany(Policy::class, 'user_id');
    }

    public function hasPermissions()
    {
        return $this->hasMany(Permission::class, 'user_id');
    }

    public function hasSettings()
    {
        return $this->hasMany(Setting::class, 'user_id');
    }

    public function hasVariable()
    {
        return $this->hasMany(Variable::class, 'user_id');
    }

    public function hasLabels()
    {
        return $this->hasMany(Label::class, 'user_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labellable');
    }

    public function hasBehaviors()
    {
        return $this->hasMany(Behavior::class, 'user_id');
    }

    public function hasMophBehaviors()
    {
        return $this->morphMany(Behavior::class, 'resource');
    }
}
