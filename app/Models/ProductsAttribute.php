<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Attributes;

class ProductsAttribute extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attributes::class);
    }
}
