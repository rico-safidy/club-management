<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextGame extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_team',
        'visitor_team',
        'match_type',
        'match_location',
        'match_date',
        'match_hour',
        'match_description',
    ];
}
