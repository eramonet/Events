<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewAllProduct extends Model
{
    use HasFactory;

    public $fillable = [
        "icon" ,
        "title_en" ,
        "title_ar"
    ];
}
