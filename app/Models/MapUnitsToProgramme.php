<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapUnitsToProgramme extends Model
{
    use SoftDeletes, ModelTrait;

    protected $appends = ['unit', 'programme_name', 'programme_value', 'degree_unit'];

    public function getUnitAttribute()
    {
        return $this->listUnit ? $this->listUnit->value : null;
    }

    public function getProgrammeNameAttribute()
    {
        return $this->listProgramme ? $this->listProgramme->name : null;
    }

    public function getProgrammeValueAttribute()
    {
        return $this->listProgramme ? $this->listProgramme->value : null;
    }

    public function getDegreeUnitAttribute()
    {
        return "({$this->degree}) $this->unit";
    }

    public function listUnit()
    {
        return $this->belongsTo(ListUnit::class);
    }

    public function listProgramme()
    {
        return $this->belongsTo(ListProgramme::class);
    }

    public function degreeUnitView()
    {
        $list = [];
        foreach (self::all() as $row) {
            $list[$row->id] = "({$row->degree}) $row->unit";
        }

        return $list;
    }
}
