<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProductWith extends Model
{
    use HasFactory;
    protected $table= 'product_products_with';
    protected $fillable=['product_with_id', 'product_id'];
}
