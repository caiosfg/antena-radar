<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satellite extends Model
{
    /** @use HasFactory<\Database\Factories\SatelliteFactory> */
    use HasFactory;

    protected $fillable =[
        'name', 
        'description', 
        'uf', 
        'avatar', 
        'location',
        'active',
        'category',
        'start_date',
        'end_date',
        'height',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
