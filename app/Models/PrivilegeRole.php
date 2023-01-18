<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivilegeRole extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['assigned_to'];

    public function getAssignedToAttribute()
    {
        return $this->userRoles()->count();
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

}
