<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'birth_place',
        'profile',
        'pseudo',
        'number',
        'post',
    ];
}
