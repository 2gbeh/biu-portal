<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapUnitsToDepartment extends Model
{
    use SoftDeletes, ModelTrait;

    protected $appends = ['unit', 'department'];

    public function getUnitAttribute()
    {
        return $this->listUnit->value;
    }

    public function getDepartmentAttribute()
    {
        return $this->listDepartment->value;
    }

    public function listUnit()
    {
        return $this->belongsTo(ListUnit::class);
    }

    public function listDepartment()
    {
        return $this->belongsTo(ListDepartment::class);
    }
}
