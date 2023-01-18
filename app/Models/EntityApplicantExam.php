<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntityApplicantExam extends Model
{
    use SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['exam', 'subject', 'grade'];

    public function getExamAttribute()
    {
        return $this->listExam->value ?? null;
    }

    public function getSubjectAttribute()
    {
        return $this->listSubject->value ?? null;
    }

    public function getGradeAttribute()
    {
        return $this->listGrade->value ?? null;
    }

    public function entityApplicant()
    {
        return $this->belongsTo(EntityApplicant::class);
    }

    public function listExam()
    {
        return $this->belongsTo(ListExam::class);
    }

    public function listSubject()
    {
        return $this->belongsTo(ListSubject::class);
    }

    public function listGrade()
    {
        return $this->belongsTo(ListGrade::class);
    }

}
