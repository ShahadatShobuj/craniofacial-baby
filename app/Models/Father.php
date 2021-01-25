<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CraniofacialCleftBaby;

class Father extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'co_morbidities' => 'array',
        'medications' => 'array'
    ];

    public function CraniofacialCleftBaby ()
    {
        return $this->belongsTo(CraniofacialCleftBaby::class);
    }
    
}
