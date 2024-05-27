<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'active' => 'boolean',
        'params' => 'array',
        'date_end' => 'date',
    ];

    protected $fillable = [
        'type',
        'title',
        'active',
        'date_end',
        'params',
    ];
}
