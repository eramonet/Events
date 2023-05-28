<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalCard extends Model
{
    use HasFactory;

    public $fillable = [
        "from",
        "to",
        "type",
        "image",
    ];
}
