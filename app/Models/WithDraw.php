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
        "total",
        "have",
        "our_commission"
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class , "vendor_name"  , "email");
    }
}
