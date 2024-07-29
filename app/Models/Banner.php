<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'active' => 'boolean',
        'params' => 'array',
        'date_start' => 'datetime:Y-m-d',
        'date_end' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'type',
        'title',
        'active',
        'date_start',
        'date_end',
        'params',
    ];


    public function getDateStartAttribute($value) { return date('d-m-Y', strtotime($value)); }
    public function getDateEndAttribute($value) { return date('d-m-Y', strtotime($value)); }

    /*
    protected function asDateTime($value)
    {
        return parent::asDateTime($value)->format('d-m-Y');
    }
    */


}
