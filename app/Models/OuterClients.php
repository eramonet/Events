<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuterClients extends Model
{
    use HasFactory;

    public $fillable = [
        "image" ,
        "name" ,
        "phone" ,
        "address"
    ] ;

    public function client_ads()
    {
        return $this->hasMany(ClientsAd::class , "client_id");
    }

    // protected function getImageAttribute(){
    //     $path = asset('user_assets/uploads/ads');

    //     return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    // }
    protected function getImageAttribute($value)
    {
        if($value){
            return asset('user_assets/uploads/ads' . '/' . $value);
            }
            else{
            return asset('user_assets/uploads/ads/default.png');
            }
    }
}
