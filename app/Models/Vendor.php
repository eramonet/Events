<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Vendor extends Model
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
        $path = asset('uploads/vendors_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'vendor_id');
    }



    public function halls()
    {
        return $this->hasMany(Hall::class, 'vendor_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'admin_id');
    }

    public function orders_products()
    {
        return $this->hasMany(OrderProduct::class , "vendor_id" , "id");
    }

    public function with_draws()
    {
        return $this->hasMany(WithDraw::class , "vendor_name" , "email") ;
    }

}
