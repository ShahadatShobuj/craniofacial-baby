<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pregnancy;
use App\Models\Delivery;
use App\Models\Newborn;
use App\Models\CraniofacialCleftBaby;

class Mother extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'co_morbidities' => 'array',
        'medications' => 'array'
    ];

    public function pregnancy ()
    {
        return $this->hasOne(Pregnancy::class);
    }

    public function delivery ()
    {
        return $this->hasOne(Delivery::class);
    }

    public function newborn ()
    {
        return $this->hasOne(Newborn::class);
    }

    public function CraniofacialCleftBaby ()
    {
        return $this->belongsTo(CraniofacialCleftBaby::class);
    }
}
