<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContactUs extends Model
{
    use HasFactory;

    public $fillable = [
        "phone" ,
        "email" ,
        "address_en" ,
        "address_ar"
    ];
}
