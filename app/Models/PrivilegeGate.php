<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivilegeGate extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['policy'];

    public function getPolicyAttribute()
    {
        return $this->privilegePolicy->policy ?? null;
    }

    public function privilegePolicy()
    {
        return $this->belongsTo(PrivilegePolicy::class);
    }
}
