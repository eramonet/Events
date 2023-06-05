<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall_booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function options(){
        return $this->belongsToMany(
            PackageOption::class,
            'hall_booking_options',
            'booking_id',
            'packge_option_id',
            'id',
            'id',
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vendor(){
        return $this->belongsTo(Admin::class);
    }

    public function hall(){
        return $this->belongsTo(Hall::class);
    }
    public function packge(){
        return $this->belongsTo(Package::class);
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
