<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available_date extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'hall_id','status', 'available_date','time_from','time_to'
    ];

    public function hall(){

        return $this->belongsTo(Hall::class,'hall_id');
    }

    public function getTimeFromAttribute()
    {
         return Carbon::parse($this->attributes['time_from'])->format('h:i');
    }

    public function getTimeToAttribute()
    {
         return Carbon::parse($this->attributes['time_to'])->format('h:i');
    }
}
