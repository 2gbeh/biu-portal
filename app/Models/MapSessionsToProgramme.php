<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapSessionsToProgramme extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $appends = ['session', 'programme_name', 'programme_value', 'session_programme_name', 'session_programme_value'];

    public function getSessionAttribute()
    {
        return $this->listSession->value;
    }

    public function getProgrammeNameAttribute()
    {
        return $this->listProgramme->name;
    }

    public function getProgrammeValueAttribute()
    {
        return $this->listProgramme->value;
    }

    public function getSessionProgrammeNameAttribute()
    {
        return $this->listSession->value . ' ' . $this->listProgramme->name;
    }

    public function getSessionProgrammeValueAttribute()
    {
        return $this->listSession->value . ' ' . $this->listProgramme->value;
    }

    public function listSession()
    {
        return $this->belongsTo(ListSession::class);
    }

    public function listProgramme()
    {
        return $this->belongsTo(ListProgramme::class);
    }

    public function sessionProgrammeView($key = 'value')
    {
        $list = [];
        foreach (self::all() as $row) {
            if ($key === 'name') {
                $list[$row->id] = $row->session_programme_name;
            } else {
                $list[$row->id] = $row->session_programme_value;
            }
        }
        
        return $list;
    }
}
