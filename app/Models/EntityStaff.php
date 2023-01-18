<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntityStaff extends Model
{
    use SoftDeletes, ModelTrait;

    protected $table = 'entity_staff';
    
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function mapSessionsToProgramme()
    {
        return $this->belongsTo(MapSessionsToProgramme::class);
    }
}
