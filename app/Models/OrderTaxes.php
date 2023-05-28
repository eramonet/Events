<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTaxes extends Model
{
    use HasFactory;

    public $fillable = [
        "order_number" ,
        "product_name" ,
        "taxe_title" ,
        "taxe_percentage"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , "product_name" , "title_en");
    }
}
