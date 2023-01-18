<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentGateway extends Model
{
    use  SoftDeletes, ModelTrait;

    protected $guarded = [];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setTestCardsAttribute($value)
    {
        $this->attributes['test_cards'] = json_encode($value);
    }

    public function setTestParamAttribute($value)
    {
        $this->attributes['test_param'] = json_encode($value);
    }

    public function setTestCurlAttribute($value)
    {
        $this->attributes['test_curl'] = json_encode($value);
    }

    public function setLiveParamAttribute($value)
    {
        $this->attributes['live_param'] = json_encode($value);
    }

    public function setLiveCurlAttribute($value)
    {
        $this->attributes['live_curl'] = json_encode($value);
    }

    public function getTestCardsAttribute($value)
    {
        return json_decode($value);
    }

    public function getTestParamAttribute($value)
    {
        return json_decode($value);
    }

    public function getTestCurlAttribute($value)
    {
        return json_decode($value);
    }

    public function getLiveParamAttribute($value)
    {
        return json_decode($value);
    }

    public function getLiveCurlAttribute($value)
    {
        return json_decode($value);
    }
}
