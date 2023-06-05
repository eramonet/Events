<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignExploreCategory extends Model
{
    use HasFactory;

    public $fillable = ["category" , "type"];

    // relations
    public function main_category()
    {
        return $this->belongsTo(ProductCategory::class , "category");
    }

    // scopes
    public function scopeMainBanner($query)
    {
        return $query->where('type', 'main');
    }

    public function scopeRightBanner($query)
    {
        return $query->where('type', 'right');
    }

    public function scopeBelowBanner($query)
    {
        return $query->where('type', 'below');
    }
}
