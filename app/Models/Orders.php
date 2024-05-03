<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];
    protected $casts = [
        'delivery' => 'array',
        'company' => 'array',
        'cart' => 'array'
    ];
    use HasFactory;
}
