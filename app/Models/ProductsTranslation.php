<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTranslation extends Model
{
    protected $fillable = ['products_id', 'locale', 'title', 'description', 'details'];
    use HasFactory;
}
