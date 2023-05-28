<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];


    protected $appends = ['image_url'];


    protected function getImageUrlAttribute()
    {
        $path = asset('uploads/users_images');

        return  is_null($this->image) ? $path . '/default.png' : $path . '/' . $this->image;
    }







    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function booking()
    {

        return $this->hasMany(Hall_booking::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, "user_id");
    }
}