<?php

namespace App\Models;

use App\Traits\ModelTrait;
use BladeHelper as h;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['avatar', 'whom'];

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getSurnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAvatarAttribute()
    {
        $sex = $this->sex ?? 'N/A';
        $photo = $this->photo ?? '';

        if (h::is_file($photo)) {
            return 'storage/uploads/' . $photo;
        } else if ($sex == 'M') {
            return 'images/avatar_m.png';
        } else if ($sex == 'F') {
            return 'images/avatar_f.png';
        } else {
            return 'images/avatar.png';
        }
    }

    public function getWhomAttribute()
    {
        // Tugbeh, Emmanuel Osaretin (M)
        $ln = $this->surname;
        $fn = $this->first_name;
        $mn = $this->middle_name;
        $sx = $this->sex ?? 'N/A';

        if ($mn) {
            return "{$ln}, {$fn} {$mn} ({$sx[0]})";
        } else {
            return "{$ln} {$fn} ({$sx[0]})";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
