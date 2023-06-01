<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
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
            ]
        ];
    }

    protected $appends = ['image_url', 'price_after_taxes'];


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

    protected function getImageUrlAttribute()
    {
        $path = asset('uploads/packages_images');

        return  is_null($this->image) ? $path . '/default.png' : $path . '/' . $this->image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'admin_id');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function category()
    {
        return $this->belongsTo(HallCategory::class, 'category_id');
    }

    public function options()
    {
        return $this->belongsToMany(PackageOption::class, 'package_option', 'package_id', 'option_id');
    }

    public function taxes()
    {
        return $this->belongsToMany(Tax::class, 'package_tax', 'package_id', 'tax_id');
    }
    public function bookings()
    {
        return $this->hasMany(Hall_booking::class);
    }
}
