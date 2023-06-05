<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWith extends Model
{
    use HasFactory;

    protected $table = 'product_products_with';
    protected $fillable = ['product_id', 'product_with_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    public function productWith()
    {
        return $this->belongsTo(Product::class, "product_with_id", "id");
    }
}