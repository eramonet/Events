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
}
