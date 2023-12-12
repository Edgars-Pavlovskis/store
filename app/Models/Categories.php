<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'filters' => 'array'
    ];
    use HasFactory;
}
