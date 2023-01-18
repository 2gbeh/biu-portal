<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\UserLogModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model
{
    use  SoftDeletes, ModelTrait, UserLogModelTrait;

    protected $guarded = [];

    protected $appends = ['user_name'];

    public function getUserNameAttribute()
    {
        return $this->user->name ?? 'Guest';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
