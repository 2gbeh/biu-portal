<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticeboard extends Model
{
    use SoftDeletes, ModelTrait;

    protected $table = 'noticeboard';

    protected $guarded = [];

    public function getRecipientsAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    public function getLinksAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    public function getAttachmentsAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
