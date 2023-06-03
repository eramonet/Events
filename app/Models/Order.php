<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->belongsToMany(
            Product::class,
            'order_product',
            'order_id',
            'product_id',
            'id',
            'id',
        );
    }

    protected $guarded = [];
    protected  $appends = ['total_extra_fees', 'total_special_discount'];

    use HasFactory, SoftDeletes;

    public $fillable = [
        "order_number",
        "customer_name",
        "customer_email",
        "customer_address",
        "customer_phone",
        "customer_promo_code_title",
        "customer_promo_code_value",
        "customer_promo_code_type",
        "product_total_price",
        "total_taxes_price",
        "shipping_fees",
        "order_from",
        "cancelled_from",
        "payment_type",
        "status",
        'order_number',
        'country_id',
        'city_id',
        'region_id'
    ];


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($order)  {

    //         $order_number = $order->id;
    //         dd($order_number);

    //         // Pad the order number with leading zeros to a length of 12 characters
    //         $order->order_number = str_pad($order_number, 12, '0', STR_PAD_LEFT);
    //     });
    // }

    ////////////////////////////////////////////////////////// Relationships /////////////////////////////////////////////
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, "order_number", "order_number");
    }

    public function generateUniqueOrderNumber()
    {

        $this->order_number = str_pad($this->id, 12, '0', STR_PAD_LEFT);
    }


    public function extra_fees()
    {
        return $this->hasMany(OrderExtraFees::class, 'order_id')->with('admin')->latest();
    }

    public function getTotalExtraFeesAttribute()
    {
        return $this->extra_fees()->sum('cost');
    }


    public function special_discount()
    {
        return $this->hasMany(OrderSpecialDiscount::class, 'order_id')->latest();
    }

    public function getTotalSpecialDiscountAttribute()
    {
        return $this->special_discount()->sum('cost');
    }




    public function products()
    {
        // return $this->hasMany(OrderDetail::class, 'order_id');

        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')->withPivot([
            'total',
            'price',
            'quantity'
        ]);
    }



    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id' , 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function inprogress_admin()
    {
        return $this->belongsTo(Admin::class, 'inprogress_action_admin_id', 'id');
    }

    public function delivered_admin()
    {
        return $this->belongsTo(Admin::class, 'delivered_action_admin_id', 'id');
    }

    public function cancelled_admin()
    {
        return $this->belongsTo(Admin::class, 'cancelled_action_admin_id', 'id');
    }




    public function promo_code()
    {
        return $this->belongsTo(PromoCode::class, 'promo_id');
    }

    public function shipping_details()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }



    public function calcOrderTotalSum()
    {

        // $this->calcPromoCode();
        // $this->calcShipping();
        $total = $this->total_products_price_with_taxes;
        $total_special_discount = $this->total_special_discount;

        $total_extra_fees = $this->total_extra_fees;
        $promo_discount = $this->promo_discount;
        $shipping = $this->shipping;
        $total_sum = $total - ($promo_discount + $total_special_discount) + ($total_extra_fees + $shipping);

        $this->total_sum = $total_sum;
    }

    public function calcPromoCode()
    {

        $promoValue = 0;
        $promo = $this->promo_code;
        if ($promo) {
            $this->promo_code_title = $promo->title;

            if ($promo->type == 'percent') {
                $promoValue  = ($promo->value  * $this->total) /     100;
            } else {
                $promoValue  = $promo->value;
            }
        }

        $this->promo_discount  = $promoValue;
    }

    public function calcShipping()
    {

        $shippingValue = 0;
        $shipping = $this->shipping_details;
        if ($shipping) {
            $shippingValue = $shipping->cost;
        }

        $this->shipping = $shippingValue;
    }

    ///////////////////////////////////////////////// scoping /////////////////////////////////////
    public function scopeInProgress($query)
    {
        return $query->where("status", 'inProgress')->latest()->get();
    }

    public function scopePending($query)
    {
        return $query->where("status", 'pending')->latest()->get();
    }

    public function scopeDelivered($query)
    {
        return $query->where("status", 'delivered')->latest()->get();
    }

    public function scopeCanceled($query)
    {
        return $query->where("status", 'cancelled')->latest()->get();
    }
}
