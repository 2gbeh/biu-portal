<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentInvoice extends Model
{
    use  SoftDeletes,ModelTrait;

    protected $appends = ['gateway', 'session_programme'];

    public function getGatewayAttribute()
    {
        return $this->paymentGateway ? $this->paymentGateway->gateway : null;
    }

    public function getSessionProgrammeAttribute()
    {
        return $this->mapSessionsToProgramme;
    }

    public function paymentGateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function mapSessionsToProgramme()
    {
        return $this->belongsTo(MapSessionsToProgramme::class);
    }
}
