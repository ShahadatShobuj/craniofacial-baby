<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CraniofacialCleftBaby;

class Treatment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'evaluation_of_imaging' => 'array',
        'orthodontic_care' => 'array'
    ];

    public function CraniofacialCleftBaby ()
    {
        return $this->belongsTo(CraniofacialCleftBaby::class);
    }
}
