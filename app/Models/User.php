<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\UserModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ModelTrait, UserModelTrait;

    protected $guarded = [];

    protected $appends = ['photo', 'first_name'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [];

    public function setAuthAttribute($value)
    {
        $this->attributes['auth'] = strtoupper($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getPhotoAttribute()
    {
        return $this->userProfile ? $this->userProfile->avatar : 'images/avatar.png';
    }

    public function getFirstNameAttribute()
    {
        return $this->name ? explode(' ', $this->name)[0] : 'Guest';
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function userContacts()
    {
        return $this->hasMany(UserContact::class);
    }

    public function userFiles()
    {
        return $this->hasMany(UserFile::class);
    }

    public function userLinks()
    {
        return $this->hasMany(UserLink::class);
    }

    public function userLogs()
    {
        return $this->hasMany(UserLog::class);
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

}
