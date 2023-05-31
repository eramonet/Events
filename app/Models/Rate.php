<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table='rates';

    protected $fillable=[
        'user_id','rate',
        'review','transaction_type',
        'transaction_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}