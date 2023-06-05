<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestBirthdayHall extends Model
{
    use HasFactory;

    public $fillable = [
        "small_text_ar" ,
        "small_text_en" ,
        "big_text_ar" ,
        "big_text_en" ,
    ];
}
