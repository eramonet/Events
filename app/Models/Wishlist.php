<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $fillable = ["product_id" ,"hall_id","user_id"] ;

    public $table='wishlists';

    /////////////////////////////////////////// Relationships /////////////////////////////
    public function product()
    {
        return $this->hasOne(Product::class , "id" , "product_id");
    }

    public function hall()
    {
        return $this->hasOne(Hall::class, "id", "hall_id");
    }
}