<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFooter extends Model
{
    use HasFactory;

    public $fillable = [
        "image" ,
        "big_text_en",
        "big_text_ar",
        "small_text_en",
        "small_text_ar",
        "apple_store_link",
        "google_play_link",
    ] ;
}
