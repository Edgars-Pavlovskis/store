<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariation extends Model
{
    protected $guarded = [];
    protected $casts = [
        'variations' => 'array'
    ];

    use HasFactory;
}
