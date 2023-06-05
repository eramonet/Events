<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopByOccasion extends Model
{
    use HasFactory;

    public $fillable = [
        "title_en" ,
        "title_ar"
    ];
}
