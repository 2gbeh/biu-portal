<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTransaction extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    protected $appends = ['user_name','session_programme'];

    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : 'Guest';
    }

    public function getSessionProgrammeAttribute()
    {
        return $this->mapSessionsToProgramme;
    }

    public function setRequestAttribute($value)
    {
        $this->attributes['request'] = json_encode($value);
    }

    public function setResponseAttribute($value)
    {
        $this->attributes['response'] = json_encode($value);
    }

    public function getRequestAttribute($value)
    {
        return json_decode($value);
    }

    public function getResponseAttribute($value)
    {
        return json_decode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentInvoice()
    {
        return $this->belongsTo(PaymentInvoice::class);
    }
    
    public function mapSessionsToProgramme()
    {
        return $this->belongsTo(MapSessionsToProgramme::class);
    }

}
