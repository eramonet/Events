<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Region extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = [];

    protected $appends =['title'];

    protected function getTitleAttribute(){
        $title = 'title_'.app()->getLocale();
        return  $this->$title;

    }
    
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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function users()
    {
        return $this->hasMany(User::class , "region_id");
    }

}
