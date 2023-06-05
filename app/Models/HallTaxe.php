<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallTaxe extends Model
{
    use HasFactory;

    protected $table = "hall_taxes" ;

    public $fillable = [
        'hall_id',
        'tax_id'
    ];
}
