<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindUs extends Model
{
    use HasFactory;

    public $fillable = [
        "name_en",
        "name_ar",
        "link"
    ];
}
