<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='notifications';
    protected $fillable=[
        'user_id','order_id', 'code_id','title_en','title_ar', 'type' ,
        'desc_en','desc_ar' , "send_from",
        'vendor_id', 'admin_id' , 'message_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function code()
    {
        return $this->belongsTo(PromoCode::class, 'code_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function message()
    {
        return $this->belongsTo(ContactMessage::class, 'message_id', 'id');
    }
}
