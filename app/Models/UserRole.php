<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['assignee', 'assigned'];

    public function getAssigneeAttribute()
    {
        return $this->user->name;
    }

    public function getAssignedAttribute()
    {
        return $this->privilegeRole->role;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function privilegeRole()
    {
        return $this->belongsTo(PrivilegeRole::class);
    }

}
