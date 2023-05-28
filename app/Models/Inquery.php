<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    use HasFactory;

    protected $table = 'inqueries';
    protected $fillable = ['name', 'email', 'mobile', 'message', 'user_id', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}