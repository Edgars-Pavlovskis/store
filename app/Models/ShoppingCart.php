<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart';
    protected $fillable = ['user_id', 'cart_data'];
    protected $casts = [
        'cart_data' => 'array',
    ];
}
