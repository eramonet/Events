<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDrawRequest extends Model
{
    use HasFactory;

    public $fillable = [
        "vendor_id",
        "budget",
        "type",
        "status",
        "notes"
    ];

    // scope
    public function scopeFromAdmin($query)
    {
        $query->where("type" , "from_admin") ;
    }

    public function scopeFromVendor($query)
    {
        $query->where("type" , "from_vendor") ;
    }

    public function scopeAccepted($query)
    {
        $query->where("status" , "accepted") ;
    }

    public function scopeRejected($query)
    {
        $query->where("status" , "rejected") ;
    }

    public function scopeNew($query)
    {
        $query->where("status" , "pending") ;
    }

    // relations

    public function vendor()
    {
        return $this->belongsTo(Vendor::class , "vendor_id" , "id" ) ;
    }
}
