<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageOptionCategory extends Model
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
        $path = asset('uploads/packages_options_categories');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'admin_id');
    }


    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function options()
    {
        return $this->hasMany(PackageOption::class, 'category_id');
    }

}
