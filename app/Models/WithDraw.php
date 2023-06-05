<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDraw extends Model
{
    use HasFactory;

    public $fillable = [
        "vendor_name",
        "vendor_phone",
        "money_type",
        "order_number" ,
        "action_id" ,
        "total",
        "have",
        "our_commission"
    ];

    public function admin()
    {
        return $this->belongsTo(Vendor::class , "vendor_name"  , "email");
    }

    // scopes
    public function scopeProductOrder($query)
    {
        $query->where("money_type" , "Product Order");
    }

    public function scopeHallBooking($query)
    {
        $query->where("money_type" , "Hall Booking");
    }

    public function with_draw_requests()
    {
        return $this->hasMany(WithDrawRequest::class , "with_draw_id" );
    }
}
