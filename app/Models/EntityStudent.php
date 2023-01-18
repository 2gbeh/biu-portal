<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntityStudent extends Model
{
    use SoftDeletes, ModelTrait;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entityApplicant()
    {
        return $this->belongsTo(EntityApplicant::class);
    }
    
    public function mapSessionsToProgramme()
    {
        return $this->belongsTo(MapSessionsToProgramme::class);
    }
}
