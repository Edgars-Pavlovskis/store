<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationsTranslation extends Model
{
    protected $fillable = ['products_variations_id', 'locale', 'name', 'description'];
    use HasFactory;
}
