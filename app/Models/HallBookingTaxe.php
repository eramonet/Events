<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallBookingTaxe extends Model
{
    use HasFactory;

    public $fillable = [
        "booking_id" ,
        "tax_name" ,
        "tax_value"
    ] ;
}
