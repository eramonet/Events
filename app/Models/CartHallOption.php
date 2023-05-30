<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHallOption extends Model
{
    use HasFactory;
    protected $table = 'cart_hall_options';

    protected $fillable = ['cart_hall_id', 'option_id', 'quantity'];


    public function cartHall()
    {
        return $this->belongsTo(CartHall::class, "cart_hall_id", "id");
    }


    public function option()
    {
        return $this->belongsTo(PackageOption::class, "option_id", "id");
    }


}