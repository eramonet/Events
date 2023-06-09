<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar',
                'separator' => '-',
            ],
            'slug_en' => [
                'source' => 'title_en',
                'separator' => '-',
            ],
        ];
    }

    protected $appends = ['type'];


    protected function getTypeAttribute()
    {

        return  !$this->parent_id ? 'Main Category' : 'Sub Category';
    }
    // protected function getImageUrlAttribute()
    // {
    //     $path = asset('uploads/products_categories_images');

    //     return  is_null($this->image) ? $path . '/default.png' : $path . '/' . $this->image;
    // }

    protected function getImageAttribute($value)
    {
        if($value){
            return asset('uploads/products_categories_images' . '/' . $value);
            }
            else{
            return asset('uploads/products_categories_images/default.png');
            }
    }
    
    public function setImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('uploads/products_categories_images/'), $imageName);
            $this->attributes['image'] = $imageName;
        }
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function sub_catagories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function products_from_main()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }




    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }


    public function scopeMain($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeSub($query)
    {
        return $query->whereNotNull('parent_id');
    }
}