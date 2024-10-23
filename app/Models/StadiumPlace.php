<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StadiumPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'stadium_place_location',
        'stadium_place_number',
        'stadium_place_number_disponible',
        'stadium_place_description',
    ];
}
