<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    use HasFactory;
    protected $fillable = [
        'stade_name',
        'stade_location',
        'stade_place_number',
        'stade_place_location_number_disponible',
        'stade_place_number_disponible',
    ];
}
