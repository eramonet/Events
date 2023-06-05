<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHall extends Model
{
    use HasFactory;

    protected $table='cart_halls';

    protected $fillable=['package_id','hall_id','user_id','date','time_from','time_to'];


    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }


    public function hall()
    {
        return $this->belongsTo(Hall::class, "hall_id", "id");
    }


    public function package()
    {
        return $this->belongsTo(Package::class, "package_id", "id");
    }
}
