<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'filters' => 'array'
    ];


    public function translations()
    {
        return $this->hasMany(CategoriesTranslation::class);
    }

    public function getTitleAttribute()
    {
        return $this->translations()->where('locale', app()->getLocale())->value('title') ?? $this->attributes['title'];
    }
    public function getOriginalTitleAttribute()
    {
        return $this->attributes['title'];
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
