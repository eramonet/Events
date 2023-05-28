<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable=['product_id','image'];

    protected function getImageAttribute($value)
    {
        if($value){
            return asset('uploads/products_images' . '/' . $value);
            }else{
                return asset('uploads/products_images/default.png');
            }
    }
}
