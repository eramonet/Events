<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    use HasFactory;
    protected $table= 'occasions';

    protected $fillable=[
        'primary_image', 'title_ar', 'title_en', 'country_id',
        'city_id', 'region_id', 'rate', 'description_ar', 'description_en'
    ];

    protected function getPrimaryImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/occasions' . '/' . $value);
        } else {
            return asset('uploads/occasions/default.png');
        }
    }
}
