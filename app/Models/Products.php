<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'array',
        'descr' => 'array',
        'details' => 'array',
        'images' => 'array'
    ];

    protected $fillable = ['attributes'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('products.title', 'like', $term)
                  ->orWhere('products.code', 'like', $term);
        });
    }
}
