<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall_booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class , "vendor_id");
    }

    public function hall(){
        return $this->belongsTo(Hall::class)->withTrashed();
    }
    public function packge(){
        return $this->belongsTo(Package::class);
    }

    public function taxes(){
        return $this->hasMany(HallBookingTaxe::class , "booking_id");
    }

    public function options(){
        return $this->hasMany(BookingDetail::class , "booking_id");
    }

    public function scopeCanceled($query)
    {
        return $query->where("status", 'cancelled')->latest()->get();
    }

    public function scopeSuccessfull($query)
    {
        return $query->where("status", 'success')->latest()->get();
    }

    public function scopePending($query)
    {
        return $query->where("status", 'pending')->latest()->get();
    }

}
