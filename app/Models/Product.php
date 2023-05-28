<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar',
                'separator' => '-',
            ],
            'slug_en' => [
                'source' => 'title_en',
                'separator' => '-',
            ],
            'id' => [
                'source' => 'id'
            ]
        ];
    }

    protected $appends = ['primary_image_url', 'profit_percent', 'price_after_taxes', 'average_rating'];

    public function getProfitPercentAttribute()
    {

        $profit = $this->real_price - 0;
        $profit_percent = $profit * 100;

        return number_format($profit_percent, 2);
    }


    public function getPriceAfterTaxesAttribute()
    {

        $price = $this->real_price;

        $taxes_sum = 0;

        foreach ($this->taxes as $tax) {


            $percentage = $tax->percentage / 100;

            $value = $percentage * $price;

            $taxes_sum += $value;
        }

        $price += $taxes_sum;
        return $price;
    }



    protected function getPrimaryImageUrlAttribute()
    {
        $path = asset('uploads/products_images');

        return  is_null($this->primary_image) ? $path . '/default.png' : $path . '/' . $this->primary_image;
    }

    public function admin()
    {
        return $this->belongsTo(Vendor::class , 'admin_id' , 'id');
    }

    public function orders(){
        return $this->belongsToMany(
            Order::class,
            'order_product',
            'product_id',
            'order_id',
            'id',
            'id',
        );
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function main_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function media()
    {
        return $this->hasMany(ProductMedia::class, 'product_id');
    }

    public function taxes()
    {
        return $this->hasMany(ProductTax::class, 'product_id');
    }

    public function products_with()
    {
        return $this->belongsToMany(Product::class, 'product_products_with', 'product_id', 'product_with_id');
    }


    public function details()
    {
        return $this->hasMany(ProductDetails::class, 'product_id');
    }


    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeOutOfStock($query)
    {
        return $query->where('stock', '<', 1);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function getAverageRatingAttribute()
    {
        $avg = $this->reviews()->avg('rating');

        return 0;
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }

    public function occasions()
    {
        return $this->belongsToMany(Occasion::class, 'product_occasions', 'product_id', 'occasion_id');
    }
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'product_vendors', 'product_id', 'vendor_id');
    }

    public function owner()
    {
        return $this->belongsTo(Vendor::class , "admin_id");
    }

    ////      scope
    public function scopeNew($query)
    {
        return $query->where("accept" , "new");
    }

    public function scopeAccept($query)
    {
        return $query->where("accept" , "accepted");
    }

    public function scopeReject($query)
    {
        return $query->where("accept" , "rejected");
    }
}
