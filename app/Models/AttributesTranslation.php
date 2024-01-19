<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesTranslation extends Model
{
    protected $fillable = ['attributes_id', 'locale', 'name', 'options'];
    protected $casts = [
        'options' => 'array'
    ];
    use HasFactory;
}
