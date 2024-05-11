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

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->whereRaw("CONCAT(name, ' ', surname) LIKE ?", ["$term"])
                ->orWhere('email', 'like', "$term")
                ->orWhereRaw("CONCAT(DATE_FORMAT(created_at, '%d%m%Y'), '-', id) LIKE ?", ["$term"]);
        });
    }


}
