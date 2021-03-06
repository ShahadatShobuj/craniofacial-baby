<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CraniofacialCleftBaby;

class Delivery extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function CraniofacialCleftBaby ()
    // {
    //     return $this->belongsTo(CraniofacialCleftBaby::class);
    // }

    public function mother ()
    {
        return $this->belongsTo(Mother::class);
    }
}
