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
}
