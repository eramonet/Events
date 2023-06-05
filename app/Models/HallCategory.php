<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallCategory extends Model
{


    use HasFactory ,SoftDeletes ,Sluggable;
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

    protected $appends =['image_url' ];


    protected function getImageUrlAttribute(){
        $path = asset('uploads/halls_categories_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function categories()
    {
        return $this->belongsToMany(HallCategory::class, 'categories_halls', 'hall_id', 'category_id');
    }

    public function halls()
    {
        return $this->belongsToMany(Hall::class, 'categories_halls', 'category_id', 'hall_id');
    }





}
