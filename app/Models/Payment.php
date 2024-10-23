<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'stripe_charge_id',
        'invoice_number',
        'article_name',
        'article_size',
        'article_color',
        'article_number',
        'article_price',
        'customer_name',
        'customer_adress',
    ];
}
