<?php

namespace App\Models;

use App\Traits\ModelTrait;  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivilegePermission extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['role', 'gate'];

    public function getRoleAttribute()
    {
        return $this->privilegeRole->role;
    }

    public function getGateAttribute()
    {
        return $this->privilegeGate->gate;
    }

    public function privilegeRole()
    {
        return $this->belongsTo(PrivilegeRole::class);
    }

    public function privilegeGate()
    {
        return $this->belongsTo(PrivilegeGate::class);
    }

}
