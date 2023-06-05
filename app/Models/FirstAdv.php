<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAdv extends Model
{
    use HasFactory;

    public $fillable = [
        "main_image" ,
        "small_text_en" ,
        "big_text_en" ,
        "small_text_ar" ,
        "big_text_ar" ,
        "link"
    ] ;
}
