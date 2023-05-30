<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table='booking_details';
    protected $fillable=['booking_id','option_id','quantity'];

    public function booking()
    {
        return $this->belongsTo(Hall_booking::class, 'booking_id', 'id');
    }

    public function option()
    {
        return $this->belongsTo(PackageOption::class, "option_id", "id");
    }
}