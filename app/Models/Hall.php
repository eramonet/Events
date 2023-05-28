<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hall extends Model
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
        ];
    }

    protected $appends = ['primary_image_url'];


    protected function getPrimaryImageUrlAttribute()
    {
        $path = asset('uploads/halls_images');

        return  is_null($this->primary_image) ? $path . '/default.png' : $path . '/' . $this->primary_image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id')->with('roles');
    }

    public function category()
    {
        return $this->hasMany(CategoryHall::class, 'hall_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function media()
    {
        return $this->hasMany(HallMedia::class, 'hall_id');
    }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function avilable_date()
    {

        return $this->hasMany(Available_date::class, 'hall_id');
    }

    public function booking()
    {

        return $this->hasMany(Hall_booking::class);
    }

    public function taxes()
    {
        return $this->BelongsToMany(
            Tax::class,
            'hall_taxes',
            'hall_id',
            'tax_id',
            'id',
            'id',
        );
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('status', 0);
    }
}
