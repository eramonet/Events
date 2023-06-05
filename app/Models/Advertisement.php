<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    public $fillable = [
        "name" ,
        "image" ,
        "title_ar" ,
        "title_en" ,
        "description_ar" ,
        "description_en" ,
        "link"
    ] ;

    public function clients_ads()
    {
        return $this->hasMany(ClientsAd::class , "ad_id");
    }

    // protected function getImageAttribute($value)
    // {
    //     if($value){
    //         return asset('user_assets/uploads/ads' . '/' . $value);
    //         }
    //         else{
    //         return asset('uploads/products_categories_images/default.png');
    //         }
    // }
    
    // public function setImageAttribute($value)
    // {
    //     if ($value) {
    //         $imageName = time() . '.' . $value->getClientOriginalExtension();
    //         $value->move(public_path('user_assets/uploads/ads/'), $imageName);
    //         $this->attributes['image'] = $imageName;
    //     }
    // }

  
}
