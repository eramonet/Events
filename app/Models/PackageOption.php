<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageOption extends Model
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
        $path = asset('uploads/packages_options');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function category()
    {
        return $this->belongsTo(PackageOptionCategory::class, 'category_id');
    }

    public function booking(){
        return $this->hasMany(
            Hall_booking::class,
            'hall_booking_options',
            'packge_option_id',
            'booking_id',
            'id',
            'id',
        );
    }


}
