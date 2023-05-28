<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    use HasFactory;
    protected $table = 'product_brands';
    protected $fillable = ['product_id', 'brand_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id", "id");
    }
}