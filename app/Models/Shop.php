<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'name', 'size', 'color', 'price', 'image'];

    // public function getSizeAttribute($value)
    // {
    //     return array_filter(explode(',', $value));
    // }
    // public function getColorAttribute($value)
    // {
    //     return array_filter(explode(', ', $value));
    // }
}
