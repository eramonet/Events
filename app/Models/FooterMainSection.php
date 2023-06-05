<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMainSection extends Model
{
    use HasFactory;

    public $fillable = [
        "big_title_en" ,
        "big_title_ar" ,
        "small_title_en" ,
        "small_title_ar" ,
    ];
}
