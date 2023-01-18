<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;


class UserContact extends Model
{
    use SoftDeletes, ModelTrait;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
