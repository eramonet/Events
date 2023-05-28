<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    public $fillable = [
        "product_id" ,
        "vendor_id" ,
        "order_number" ,
        "product_title" ,
        "price" ,
        "product_quantity"
    ];

    /////////////////////////////////////////////// Relationship //////////////////////////////////
    public function order_taxes(){
        return $this->hasMany(OrderTaxes::class , "product_name" , "product_title");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function order()
    {
        return $this->belongsTo(Order::class , "order_number" , "order_number") ;
    }

}
