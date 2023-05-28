<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    use HasFactory;
    protected $table= 'occasions';

    protected $fillable=[
        'primary_image', 'icon' , 'title_ar', 'title_en', 'country_id',
        'city_id', 'region_id', 'rate', 'description_ar', 'description_en' , 'for_what'
    ];

    protected function getPrimaryImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/occasions' . '/' . $value);
        } else {
            return asset('uploads/occasions/default.png');
        }
    }

    protected function getIconAttribute($value)
    {
        if ($value) {
            return asset('uploads/occasions' . '/' . $value);
        } else {
            return asset('uploads/occasions/default.png');
        }
    }


    // scope
    public function scopeForProduct($query)
    {
        $query->where("for_what" , "product")->orWhere("for_what" , "both");
    }

    public function scopeForHall($query)
    {
        $query->where("for_what" , "hall")->orWhere("for_what" , "both");
    }

    public function scopeForBoth($query)
    {
        $query->where("for_what" , "both");
    }
}
