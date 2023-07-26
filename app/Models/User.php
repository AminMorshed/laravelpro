<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_type',
        'phone_number',
        'is_superuser',
        'is_staff',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isSuperUser()
    {
        return $this->is_superuser;
    }

    public function isStaffUser()
    {
        return $this->is_staff;
    }

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasTwoFactory($key)
    {
        return $this->two_factor_type == $key;
    }

    public function hasTwoFactorAuthenticatedEnabled()
    {
        return $this->two_factor_type !== 'off';
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($roles)
    {
        return (!!$roles->intersect($this->roles)->all());
    }

    public function hasPermission($permission)
    {
        return $this->permission->contains('name', $permission->name) || $this->hasRole($permission->roles);
    }
}
