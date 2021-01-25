<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mother;

class Pregnancy extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'intercourse_during_pregnancy_time_phase' => 'array',
        'intercourse_during_pregnancy_unusual_symptom' => 'array',
        'contamination_drinking_water_type' => 'array',
        'air_pollution_type' => 'array'
    ];

    public function mother ()
    {
        return $this->belongsTo(Mother::class);
    }
}
