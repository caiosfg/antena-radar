<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        return $this->hasMany(User::class);
    }
}
