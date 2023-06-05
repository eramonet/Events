<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DynamicPage extends Model
{
    use HasFactory,Sluggable ,SoftDeletes;
    protected $table ='dynamic_pages';
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

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id')->with('roles');
    }




    protected $appends =['image_url'];

    protected function getImageUrlAttribute(){
        $path = asset('uploads/dynamic_pages_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }
}
