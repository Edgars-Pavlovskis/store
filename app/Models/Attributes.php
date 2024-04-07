<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Attributes extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'options' => 'array'
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_attributes')->withPivot('value');
    }

    public function translations()
    {
        return $this->hasMany(AttributesTranslation::class);
    }


    public function getNameAttribute()
    {
        return $this->translations()->where('locale', app()->getLocale())->value('name') ?? $this->attributes['name'];
    }
    public function getOriginalNameAttribute()
    {
        return $this->attributes['name'];
    }


    public function getOptionsAttribute()
    {
        return json_decode($this->translations()->where('locale', app()->getLocale())->value('options'), true) ?? json_decode($this->attributes['options'], true);
    }
    public function getOriginalOptionsAttribute()
    {
        return json_decode($this->attributes['options']);
    }
}


