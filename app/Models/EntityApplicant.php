<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntityApplicant extends Model
{
    use SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['application_status'];

    public function getApplicationStatusAttribute()
    {
        $enum = ['Registered', 'Applied', 'Admitted', 'Rejected', 'Critical', 'Paid'];
        return $enum[$this->status];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapUnitsToProgramme()
    {
        return $this->belongsTo(MapUnitsToProgramme::class);
    }

    public function mapSessionsToProgramme()
    {
        return $this->belongsTo(MapSessionsToProgramme::class);
    }

    public function entityApplicantExams()
    {
        return $this->hasMany(EntityApplicantExam::class);
    }

    public function entityStudent()
    {
        return $this->hasOne(EntityStudent::class);
    }
}
