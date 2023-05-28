<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestWeddingHalls extends Model
{
    use HasFactory;

    public $fillable = [
        "small_title_en",
        "small_title_ar",
        "big_title_en",
        "big_title_ar",
    ];
}
