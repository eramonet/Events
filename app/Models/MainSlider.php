<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;
    public $fillable = [
        "main_image" ,
        "intro_title_en" ,
        "intro_title_ar" ,
        "big_text_en" ,
        "big_text_ar" ,
        "link" ,
        "description_en",
        "description_ar"
    ] ;
}
