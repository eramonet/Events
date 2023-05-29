<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public $table = 'colors';
    public $fillable = [
        "name_en",
        "name_ar",
        "code",
    ];
}
