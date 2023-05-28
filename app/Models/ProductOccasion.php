<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOccasion extends Model
{
    use HasFactory;

    protected $table = 'product_occasions';
    protected $fillable = ['product_id', 'occasion_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class, "occasion_id", "id");
    }
}
