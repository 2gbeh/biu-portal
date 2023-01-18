<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapDepartmentsToFaculty extends Model
{
    use SoftDeletes, ModelTrait;

    protected $appends = ['department', 'faculty_name', 'faculty_value'];

    public function getDepartmentAttribute()
    {
        return $this->listDepartment->value;
    }

    public function getFacultyNameAttribute()
    {
        return $this->listFaculty->name;
    }

    public function getFacultyValueAttribute()
    {
        return $this->listFaculty->value;
    }

    public function listDepartment()
    {
        return $this->belongsTo(ListDepartment::class);
    }

    public function listFaculty()
    {
        return $this->belongsTo(ListFaculty::class);
    }
}
