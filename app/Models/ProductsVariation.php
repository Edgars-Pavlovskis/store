<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariation extends Model
{
    protected $guarded = [];
    protected $casts = [
        'variations' => 'array'
    ];

    use HasFactory;


    public function translations()
    {
        return $this->hasMany(VariationsTranslation::class, 'products_variations_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->translations()->where('locale', app()->getLocale())->value('name') ?? $this->attributes['name'];
    }
    public function getOriginalNameAttribute()
    {
        return $this->attributes['name'];
    }


    public function getDescriptionAttribute()
    {
        return $this->translations()->where('locale', app()->getLocale())->value('description') ?? $this->attributes['description'];
    }
    public function getOriginalDescriptionAttribute()
    {
        return $this->attributes['description'];
    }




}
