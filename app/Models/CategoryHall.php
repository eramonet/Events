<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CategoryHall extends Model
{
    use HasFactory;
    protected $table= 'categories_halls';
    protected $fillable=['category_id', 'hall_id'];
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}