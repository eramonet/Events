<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallPackage extends Model
{
    use HasFactory;

    protected $table='hall_packages';
    protected $fillable=['hall_id','package_id'];

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}