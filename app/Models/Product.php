<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'total_price',
        'submitted_at'
    ];

    protected $dates = [
        'submitted_at'
    ];
}
