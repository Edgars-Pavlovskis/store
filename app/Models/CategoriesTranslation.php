<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesTranslation extends Model
{
    protected $fillable = ['categories_id', 'locale', 'title', 'description'];
    use HasFactory;
}
