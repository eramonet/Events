<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsAd extends Model
{
    use HasFactory;

    public $fillable = [
        "client_id" ,
        "client_type" ,
        "ad_id",
        "location",
        "views" ,
        "clicks" ,
        "from" ,
        "to" ,
        "activation" ,
        "status"
    ];

    /////////////////////////////////// Relationships //////////////////////////////
    public function outer_client()
    {
        return $this->belongsTo(OuterClients::class , "client_id") ;
    }

    public function inner_clients()
    {
        return $this->belongsTo(Vendor::class , "client_id") ;
    }

    public function ad()
    {
        return $this->belongsTo(Advertisement::class , "ad_id") ;
    }

    //////////////////////////////// scopes //////////////////////////////
    public function scopeActive($query)
    {
        return $query->where('activation', "yes")->where("status" , "active");
    }

    public function scopeMainHome($query)
    {
        return $query->where('location', "Main Home");
    }

    public function scopeSubHome1($query)
    {
        return $query->where('location', "Sub Home 1");
    }

    public function scopeSubHome2($query)
    {
        return $query->where('location', "Sub Home 2");
    }

    public function scopeBrandMenu($query)
    {
        return $query->where('location', "In Brand Menu");
    }
}
