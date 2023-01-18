<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wifi extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $table = 'wifi';

    protected $guarded = [];

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
