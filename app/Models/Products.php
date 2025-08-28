<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attributes;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'images' => 'array',
        'variations' => 'array'
    ];

public function scopeSearch($query, $term)
{
    $words = explode(' ', $term); // sadala pa vārdiem

    $query->where(function($query) use ($words) {
        foreach ($words as $word) {
            $word = "%$word%";
            $query->where(function($q) use ($word) {
                $q->where('products.title', 'like', $word)
                  ->orWhere('products.code', 'like', $word)
                  ->orWhere('products.inner_code', 'like', $word);
            });
        }
    });
}



    public function attributes()
    {
        return $this->belongsToMany(Attributes::class, 'products_attributes')->withPivot('value');
    }

    public function translations()
    {
        return $this->hasMany(ProductsTranslation::class);
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



    public function getDetailsAttribute()
    {
        return $this->translations()->where('locale', app()->getLocale())->value('details') ?? $this->attributes['details'];
    }
    public function getOriginalDetailsAttribute()
    {
        return $this->attributes['details'];
    }

}
