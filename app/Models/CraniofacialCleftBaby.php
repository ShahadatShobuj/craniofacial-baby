<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mother;
use App\Models\Father;
use App\Models\Address;
use App\Models\Outcome;
use App\Models\Newborn;
use App\Models\Delivery;
use App\Models\Treatment;
use App\Models\Pregnancy;
use App\Models\SpeechDevelopment;
use App\Models\HearingDevelopment;

class CraniofacialCleftBaby extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mother ()
    {
        return $this->hasOne(Mother::class);
    }
    public function father ()
    {
        return $this->hasOne(Father::class);
    }
    public function address ()
    {
        return $this->hasOne(Address::class);
    }
    // public function pregnancyDetail ()
    // {
    //     return $this->hasOne(PregnancyDetail::class);
    // }
    // public function deliveryDetail ()
    // {
    //     return $this->hasOne(DeliveryDetail::class);
    // }
    // public function newborn ()
    // {
    //     return $this->hasOne(Newborn::class);
    // }
    public function speechDevelopment ()
    {
        return $this->hasOne(SpeechDevelopment::class);
    }
    public function hearingDevelopment ()
    {
        return $this->hasOne(HearingDevelopment::class);
    }
    public function treatment ()
    {
        return $this->hasOne(Treatment::class);
    }
    
    public function outcome ()
    {
        return $this->hasOne(Outcome::class);
    }
    

}
