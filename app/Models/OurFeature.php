<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurFeature extends Model
{
    use HasFactory;

    public $fillable = [
        "icon" ,
        "title_en" ,
        "sub_title_en" ,
        "title_ar" ,
        "sub_title_ar"
    ];
}
