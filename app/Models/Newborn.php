<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mother;

class Newborn extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'ring_constrictions_involving_area' => 'array',
        'other_congenital_anomalies_involved_system' => 'array'
    ];

    public function mother ()
    {
        return $this->belongsTo(Mother::class);
    }
    
}
