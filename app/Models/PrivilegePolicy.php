<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivilegePolicy extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    public function privilegeGates()
    {
        return $this->hasMany(PrivilegeGate::class);
    }
}
