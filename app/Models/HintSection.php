<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HintSection extends Model
{
    use HasFactory;

    public $fillable = [
        "small_text_en",
        "small_text_ar",
        "base_text_en",
        "base_text_ar",
        "short_description_en",
        "short_description_ar",
        "full_description_en",
        "full_description_ar",
        "video",
    ];
}
